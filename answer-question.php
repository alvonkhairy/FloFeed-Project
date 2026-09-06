<?php
session_start(); // jalankan session //
require_once __DIR__ . '/koneksi.php'; // hubungkan file koneksi //

// kalau belum login/tidak ada session, akan dilempar ke login //
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// input room kode room dan id room //
$roomCode = trim($_GET['kode'] ?? $_POST['room_code'] ?? '');
$roomId = (int) ($_POST['room_id'] ?? 0);
$error = '';
$answers = $_POST['answers'] ?? [];
$room = null;
$questions = [];

// mencari room //
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $roomId > 0) {
    $roomStmt = $pdo->prepare('SELECT id, title, room_code FROM rooms WHERE id = :id');
    $roomStmt->execute(['id' => $roomId]);
    $room = $roomStmt->fetch();
} elseif ($roomCode !== '') {
    $roomStmt = $pdo->prepare('SELECT id, title, room_code FROM rooms WHERE room_code = :room_code');
    $roomStmt->execute(['room_code' => $roomCode]);
    $room = $roomStmt->fetch();
}

// kalau room tidak ditemukan, atau salah masukkan kode //
if (!$room) {
    $error = 'Room tidak ditemukan.';

// Ambil semua pertanyaan di room itu, buat ditampilkan sebagai form isian //
} else {
    $questionStmt = $pdo->prepare('SELECT id, question_text FROM questions WHERE room_id = :room_id ORDER BY order_index, id');
    $questionStmt->execute(['room_id' => $room['id']]);
    $questions = $questionStmt->fetchAll();

// validasi semua pertanyaan wajib dijawab //
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (count($questions) === 0) {
            $error = 'Room belum memiliki pertanyaan.';
        } else {
            foreach ($questions as $question) {
                if (trim($answers[$question['id']] ?? '') === '') {
                    $error = 'Semua pertanyaan wajib dijawab.';
                    break;
                }
            }
        }

// insert dan update ke room_participants //
        if ($error === '') {
            try {
                $pdo->beginTransaction();

                $participantStmt = $pdo->prepare(
                    'INSERT INTO room_participants (room_id, user_id, status, submitted_at)
                     VALUES (:room_id, :user_id, :status, NOW())
                     ON DUPLICATE KEY UPDATE status = :updated_status, submitted_at = NOW()'
                );
                $participantStmt->execute([
                    'room_id' => $room['id'],
                    'user_id' => $_SESSION['user_id'],
                    'status' => 'sudah_mengisi',
                    'updated_status' => 'sudah_mengisi',
                ]);

// buat id baris room_participants nya (buat dipakai simpan jawaban) //
                $participantIdStmt = $pdo->prepare('SELECT id FROM room_participants WHERE room_id = :room_id AND user_id = :user_id');
                $participantIdStmt->execute([
                    'room_id' => $room['id'],
                    'user_id' => $_SESSION['user_id'],
                ]);
                $participantId = $participantIdStmt->fetchColumn();

// menghapus jawaban lama sebelum insert yang baru //
                $deleteStmt = $pdo->prepare('DELETE FROM answers WHERE room_participant_id = :room_participant_id');
                $deleteStmt->execute(['room_participant_id' => $participantId]);

// insert id peserta room, id pertanyaan dan jawaban ke tabel answers //
                $answerStmt = $pdo->prepare(
                    'INSERT INTO answers (room_participant_id, question_id, answer_text)
                     VALUES (:room_participant_id, :question_id, :answer_text)'
                );

//  Loop tiap pertanyaan, simpan jawabannya satu-satu //
                foreach ($questions as $question) {
                    $answerStmt->execute([
                        'room_participant_id' => $participantId,
                        'question_id' => $question['id'],
                        'answer_text' => trim($answers[$question['id']]),
                    ]);
                }

// kalau ada proses yang gagal,tidak ada data setengah setengah yang tersimpan //
                $pdo->commit();
                header('Location: answer-result.php?room_id=' . $room['id']);
                exit;
            } catch (PDOException $e) {
                if ($pdo->inTransaction()) {
                    $pdo->rollBack();
                }
                $error = 'Feedback gagal dikirim.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FloFeed - Feedback</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php require __DIR__ . '/components/navbar.php'; ?>

<main class="page answer-page">
    <?php if ($error !== ''): ?>
        <div class="notice" style="color: #b42318; background: #fef3f2;">
            <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
        </div>
    <?php endif; ?>

    <?php if ($room): ?>
        <div class="card title-card">
            <div>
                <div class="title-main"><?php echo htmlspecialchars($room['title'], ENT_QUOTES, 'UTF-8'); ?></div>
                <div class="title-sub">Kode room: <?php echo htmlspecialchars($room['room_code'], ENT_QUOTES, 'UTF-8'); ?></div>
            </div>
            <div class="badge-anonim">Feedback anonim</div>
        </div>

        <form method="post">
            <input type="hidden" name="room_id" value="<?php echo $room['id']; ?>">
            <input type="hidden" name="room_code" value="<?php echo htmlspecialchars($room['room_code'], ENT_QUOTES, 'UTF-8'); ?>">

            <?php foreach ($questions as $index => $question): ?>
                <div class="card">
                    <div class="question-header">
                        <div class="question-number"><?php echo $index + 1; ?></div>
                        <div class="question-text"><?php echo htmlspecialchars($question['question_text'], ENT_QUOTES, 'UTF-8'); ?></div>
                    </div>
                    <textarea class="answer-box" name="answers[<?php echo $question['id']; ?>]" placeholder="Tulis jawabanmu di sini..." required><?php echo htmlspecialchars($answers[$question['id']] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>
            <?php endforeach; ?>

            <div class="notice">Identitas Anda tidak akan diketahui oleh siapapun</div>

            <div class="button-row">
                <a class="btn btn-cancel" href="home.php">Batal</a>
                <button class="btn btn-submit" type="submit">&#9992; Kirim Feedback</button>
            </div>
        </form>
    <?php endif; ?>
</main>
</body>
</html>
