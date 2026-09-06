<?php
session_start(); // jalankan session //
require_once __DIR__ . '/../koneksi.php'; // hubungkan file koneksi dan database//

// kalau belum login/tidak ada session, akan dilempar ke login //
if (!isset($_SESSION['user_id'])) {
  header('Location: ../login.php');
  exit;
}

// Ambil dua parameter dari URL "?question_id=...&room_id=..." //
$roomId = (int) ($_GET['room_id'] ?? 0);
$questionId = (int) ($_GET['question_id'] ?? 0);

// Query verifikasi kepemilikan //
$questionStmt = $pdo->prepare(
  'SELECT questions.question_text, rooms.title
   FROM questions
   INNER JOIN rooms ON rooms.id = questions.room_id
   WHERE questions.id = :question_id AND rooms.id = :room_id AND rooms.user_id = :user_id'
);
$questionStmt->execute([
  'question_id' => $questionId, // pertanyaan itu harus ada //
  'room_id' => $roomId, // ertanyaan itu harus ada sesuai dengan url //
  'user_id' => $_SESSION['user_id'], // room itu harus milik user yang sedang login //
]);
$question = $questionStmt->fetch();

// $question bakal kosong, dan user dilempar ke room-management.php //
if (!$question) {
  header('Location: ../room-management.php');
  exit;
}

// Query ambil jawaban //
$answerStmt = $pdo->prepare(
  'SELECT answer_text, created_at FROM answers
   WHERE question_id = :question_id ORDER BY created_at DESC'
);
$answerStmt->execute(['question_id' => $questionId]);
$answers = $answerStmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<base href="../">
<title>FloFeed - Jawaban Feedback</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php require __DIR__ . '/../components/navbar.php'; ?>

  <main class="room-page feedback-answer-page">
    <div class="page-header-row">
      <a class="back-btn" href="room-master/room-anonymous-home.php?id=<?php echo $roomId; ?>" aria-label="Kembali ke daftar feedback">&#8249;</a>
      <div class="page-title-group">
        <h1>Feedback</h1>
        <p><?php echo htmlspecialchars($question['title'], ENT_QUOTES, 'UTF-8'); ?></p>
      </div>
    </div>

    <section class="feedback-answer-question card" aria-labelledby="feedback-question-title">
      <div class="feedback-answer-label">Pertanyaan</div>
      <h2 id="feedback-question-title"><?php echo htmlspecialchars($question['question_text'], ENT_QUOTES, 'UTF-8'); ?></h2>
      <div class="feedback-answer-count"><?php echo count($answers); ?> jawaban</div>
    </section>

    <section class="feedback-responses" aria-labelledby="feedback-responses-title">
      <h2 class="feedback-section-title" id="feedback-responses-title"><span class="feedback-title-mark" aria-hidden="true"></span>Jawaban Masuk</h2>

      <?php foreach ($answers as $index => $answer): ?>
        <article class="feedback-response card">
          <div class="feedback-response-number">Jawaban <?php echo $index + 1; ?></div>
          <p><?php echo htmlspecialchars($answer['answer_text'], ENT_QUOTES, 'UTF-8'); ?></p>
        </article>
      <?php endforeach; ?>
      <?php if (count($answers) === 0): ?>
        <p>Belum ada jawaban untuk pertanyaan ini.</p>
      <?php endif; ?>
    </section>
  </main>

</body>
</html>
