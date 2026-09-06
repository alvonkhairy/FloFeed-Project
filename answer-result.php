<?php
session_start(); // jalankan session //
require_once __DIR__ . '/koneksi.php'; // hubungkan file koneksi //

// kalau belum login/tidak ada session, akan dilempar ke login //
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Ambil room_id dari URL, lalu ambil judul room-nya buat ditampilkan //
$roomId = (int) ($_GET['room_id'] ?? 0);
$roomStmt = $pdo->prepare('SELECT title FROM rooms WHERE id = :id');
$roomStmt->execute(['id' => $roomId]);
$room = $roomStmt->fetch();
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FloFeed - Terima Kasih</title>
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
<?php require __DIR__ . '/components/navbar.php'; ?>

<main class="page thank-you-page">
    <section class="card thank-you-card" aria-labelledby="thank-you-title">
        <div class="thank-you-icon" aria-hidden="true">&#10003;</div>
        <h1 id="thank-you-title">Terima kasih telah mengisi</h1>
        <p>Feedback untuk <?php echo htmlspecialchars($room['title'] ?? 'room', ENT_QUOTES, 'UTF-8'); ?> sudah berhasil dikirim.</p>
        <a class="btn btn-submit" href="home.php">Kembali ke Beranda</a>
    </section>
</main>
</body>
</html>
