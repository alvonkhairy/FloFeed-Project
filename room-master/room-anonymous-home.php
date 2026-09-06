<?php
session_start(); // jalankan session //
require_once __DIR__ . '/../koneksi.php'; // hubungkan file koneksi dan database//

// kalau belum login/tidak ada session, akan dilempar ke login //
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

// ambil data room dan data user di database //
$roomId = (int) ($_GET['id'] ?? 0);
$roomStmt = $pdo->prepare('SELECT id, title, room_code FROM rooms WHERE id = :id AND user_id = :user_id');
$roomStmt->execute([
    'id' => $roomId,
    'user_id' => $_SESSION['user_id'],
]);
$room = $roomStmt->fetch();

if (!$room) {
    header('Location: ../room-management.php');
    exit;
}

// Ambil semua pertanyaan di room, sekaligus hitung berapa banyak yang sudah menjawab tiap pertanyaan //
$questionStmt = $pdo->prepare(
    'SELECT questions.id, questions.question_text, COUNT(answers.id) AS answer_count
     FROM questions
     LEFT JOIN answers ON answers.question_id = questions.id
     WHERE questions.room_id = :room_id
     GROUP BY questions.id, questions.question_text, questions.order_index
     ORDER BY questions.order_index, questions.id'
);
$questionStmt->execute(['room_id' => $roomId]);
$questions = $questionStmt->fetchAll();

// Query terpisah untuk hitung jumlah peserta //
$participantStmt = $pdo->prepare('SELECT COUNT(*) FROM room_participants WHERE room_id = :room_id');
$participantStmt->execute(['room_id' => $roomId]);
$participantCount = $participantStmt->fetchColumn();
$answerCount = 0;

// menjumlahkan ulang angka answer_count yang sudah didapat dari query pertanyaan untuk total jawaban //
foreach ($questions as $question) {
    $answerCount += (int) $question['answer_count'];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<base href="../">
<title>FloFeed - <?php echo htmlspecialchars($room['title'], ENT_QUOTES, 'UTF-8'); ?></title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php require __DIR__ . '/../components/navbar.php'; ?>

  <main class="room-page">
    <div class="page-header-row">
      <a class="back-btn" href="room-management.php" aria-label="Kembali">&#8249;</a>
      <div class="page-title-group">
        <h1><?php echo htmlspecialchars($room['title'], ENT_QUOTES, 'UTF-8'); ?></h1>
        <p>Room Master &middot; Kode: <?php echo htmlspecialchars($room['room_code'], ENT_QUOTES, 'UTF-8'); ?></p>
      </div>
    </div>

    <div class="feedback-summary stat-grid">
      <div class="card stat-card">
        <div class="stat-number"><?php echo $participantCount; ?></div>
        <div class="stat-label">Jumlah Peserta</div>
      </div>
      <div class="card stat-card">
        <div class="stat-number"><?php echo count($questions); ?></div>
        <div class="stat-label">Jumlah Feedback</div>
      </div>
      <div class="card stat-card">
        <div class="stat-number"><?php echo $answerCount; ?></div>
        <div class="stat-label">Jumlah Jawaban</div>
      </div>
    </div>

    <h2 class="feedback-section-title"><span class="feedback-title-mark" aria-hidden="true"></span>Daftar Feedback</h2>

    <div class="feedback-grid">
      <?php foreach ($questions as $index => $question): ?>
        <article class="feedback-card feedback-list-card">
          <div class="feedback-list-head">
            <h2>Feedback <?php echo $index + 1; ?></h2>
          </div>
          <p class="feedback-preview">&quot;<?php echo htmlspecialchars($question['question_text'], ENT_QUOTES, 'UTF-8'); ?>&quot;</p>
          <a class="feedback-answer-link" href="room-master/room-anonymous-feedback.php?question_id=<?php echo $question['id']; ?>&room_id=<?php echo $room['id']; ?>">
            <span><?php echo $question['answer_count']; ?> jawaban</span>
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m9 18 6-6-6-6" /></svg>
          </a>
        </article>
      <?php endforeach; ?>
      <?php if (count($questions) === 0): ?>
        <p>Belum ada pertanyaan di room ini.</p>
      <?php endif; ?>
    </div>
  </main>
</body>
</html>
