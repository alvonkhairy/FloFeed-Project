<?php
session_start(); // jalankan session //
require_once __DIR__ . '/koneksi.php'; // hubungkan file koneksi dan database//

// kalau belum login/tidak ada session, akan dilempar ke login //
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$error = '';
$roomId = (int) ($_GET['id'] ?? 0);
$title = '';
$questions = [];

// ambil data room dan data user di database //
if ($roomId > 0) {
    $roomStmt = $pdo->prepare('SELECT title FROM rooms WHERE id = :id AND user_id = :user_id');
    $roomStmt->execute([
        'id' => $roomId,
        'user_id' => $_SESSION['user_id'],
    ]);
    $room = $roomStmt->fetch();

    if (!$room) {
        header('Location: room-management.php');
        exit;
    }

// Ambil semua pertanyaan yang sudah tersimpan untuk room //
    $title = $room['title'];

    $questionStmt = $pdo->prepare('SELECT question_text FROM questions WHERE room_id = :room_id ORDER BY order_index, id');
    $questionStmt->execute(['room_id' => $roomId]);
    $savedQuestions = $questionStmt->fetchAll();
    $questions = array_column($savedQuestions, 'question_text');
}

// proses simpan data room dan pertanyaan baru ke database //
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roomId = (int) ($_POST['room_id'] ?? 0);
    $title = trim($_POST['title'] ?? '');
    $questions = array_values(array_map('trim', $_POST['questions'] ?? []));
    if (count($questions) === 0) {
        $questions[] = '';
    }
    $action = isset($_POST['remove_index']) ? 'remove_question' : ($_POST['action'] ?? 'save'); // hapus pertanyaan //

// tambah pertanyaan //
    if ($action === 'add_question') {
        $questions[] = '';
    } elseif ($action === 'remove_question') {
        $removeIndex = (int) ($_POST['remove_index'] ?? -1);
        unset($questions[$removeIndex]);
        $questions = array_values($questions);

        if (count($questions) === 0) {
            $questions[] = '';
        }
    }

// buat judul room dan pertanyaan baru //
    if ($action !== 'save') {
        $error = '';
    } elseif ($title === '' || in_array('', $questions, true)) {
        $error = 'Judul room dan minimal satu pertanyaan wajib diisi.';
    } elseif (strlen($title) > 150) {
        $error = 'Judul room maksimal 150 karakter.';
    } else {

//  pengecekan ulang proses simpan _POST //
        try {
            if ($roomId > 0) {
                $ownerStmt = $pdo->prepare('SELECT id FROM rooms WHERE id = :id AND user_id = :user_id');
                $ownerStmt->execute([
                    'id' => $roomId,
                    'user_id' => $_SESSION['user_id'],
                ]);

                if (!$ownerStmt->fetch()) {
                    throw new PDOException('Room tidak ditemukan.');
                }
            }

            $pdo->beginTransaction();
// update judul room dan hapus pertanyaan lama //
            if ($roomId > 0) {
                $roomStmt = $pdo->prepare('UPDATE rooms SET title = :title WHERE id = :id AND user_id = :user_id');
                $roomStmt->execute([
                    'title' => $title,
                    'id' => $roomId,
                    'user_id' => $_SESSION['user_id'],
                ]);

// hapus semua pertanyaan lama, lalu insert ulang semuanya sebagai baru //
                $deleteQuestions = $pdo->prepare('DELETE FROM questions WHERE room_id = :room_id');
                $deleteQuestions->execute(['room_id' => $roomId]);

// generate kode room unik //
            } else {
                $roomCode = '';
                do {
                    $roomCode = strtoupper(substr(str_shuffle('ABCDEFGHJKLMNPQRSTUVWXYZ23456789'), 0, 6));
                    $codeStmt = $pdo->prepare('SELECT id FROM rooms WHERE room_code = :room_code');
                    $codeStmt->execute(['room_code' => $roomCode]);
                } while ($codeStmt->fetch());

// Insert room baru, lalu ambil id-nya yang baru dibuat //
                $roomStmt = $pdo->prepare('INSERT INTO rooms (user_id, title, room_code) VALUES (:user_id, :title, :room_code)');
                $roomStmt->execute([
                    'user_id' => $_SESSION['user_id'],
                    'title' => $title,
                    'room_code' => $roomCode,
                ]);
                $roomId = $pdo->lastInsertId();
            }

// pertanyaan baru disimpan ke database, dengan order_index sesuai urutan input //
            $questionStmt = $pdo->prepare('INSERT INTO questions (room_id, question_text, order_index) VALUES (:room_id, :question_text, :order_index)');
            foreach ($questions as $index => $question) {
                $questionStmt->execute([
                    'room_id' => $roomId,
                    'question_text' => $question,
                    'order_index' => $index + 1,
                ]);
            }

// semua query dianggap satu paket "semua-atau-tidak-sama-sekali" . kalau ada error, semua query dibatalkan dan tidak ada yang tersimpan //
            $pdo->commit();
            header('Location: room-management.php');
            exit;
        } catch (PDOException $e) {
            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            }
            $error = 'Room gagal disimpan.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FloFeed-buat soal</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php require __DIR__ . '/components/navbar.php'; ?>

    <main class ="page">
        <div class="page-header">
            <a class="back-btn" href="home.php" aria-label="Kembali">&#8249;</a>
            <div class="page-title-group">
                <h1><?php echo $roomId > 0 ? 'Edit Room' : 'Buat Room Baru'; ?></h1>
                <p>Rancang pertanyaan untuk peserta Anda</p>
            </div>
        </div>

        <section class="card">
            <?php if ($error !== ''): ?> 
                <p style="color: #b42318; margin-bottom: 16px;"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endif; ?>
            <form method="post">
                <input type="hidden" name="room_id" value="<?php echo $roomId; ?>">
                <label class="field-label" for="judul-room">Judul Room</label>
                <input class="text-input" id="judul-room" name="title" type="text" value="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>" placeholder="Masukkan judul room..." required>
                <div id="question-list">
                    <?php if (count($questions) === 0): ?>
                        <?php $questions = ['']; ?>
                    <?php endif; ?>
                    <?php foreach ($questions as $index => $question): ?>
                        <section class="card question-card">
                            <div class="question-head">
                                <span class="pill pill-purple">Pertanyaan <?php echo $index + 1; ?></span>
                                <span class="pill pill-grey">Teks Bebas</span>
                                <button class="remove-question" type="submit" name="remove_index" value="<?php echo $index; ?>" aria-label="Hapus pertanyaan" formaction="room-create.php" formnovalidate>
                                    &times;
                                </button>
                            </div>
                            <input class="text-input question-input" name="questions[]" type="text" value="<?php echo htmlspecialchars($question, ENT_QUOTES, 'UTF-8'); ?>" placeholder="Tulis pertanyaan..." required>
                        </section>
                    <?php endforeach; ?>
                </div>

                <button class="add-question-btn" type="submit" name="action" value="add_question" formnovalidate>
                    <span class="plus">+</span>Tambah Pertanyaan
                </button>

                <div class="actions">
                    <a class="btn btn-secondary" href="room-management.php">Batal</a>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </section>
    </main>

</body>
</html>