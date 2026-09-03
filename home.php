<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'] ?? 'User';
$email = $_SESSION['email'] ?? 'user@example.com';
$initials = strtoupper(substr($username, 0, 2));
?>
<!doctype html>
<html lang="id">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>FloFeed - Home</title>
		<link rel="stylesheet" href="assets/css/style.css" />
	</head>
	<body>
		<?php
		require_once __DIR__ . '/component/navbar.php';
		renderNavbar('.');
		?>

		<main class="home-page">
			<section class="welcome" aria-labelledby="welcome-title">
				<h1 id="welcome-title",>Selamat Pagi, <?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>  &#128075;</h1>
				<p>Apa yang ingin anda lakukan hari ini?</p>
			</section>

			<div class="home-grid">
				<section class="card join-card" aria-labelledby="join-title">
					<h2 class="card-heading" id="join-title"><span class="symbol">#</span>Masukan Kode Room</h2>
					<p class="card-description">Gabung kedalam room dengan kode yang sudah di bagikan</p>
					<form class="join-form" action="answer-question.php" method="get">
						<input class="text-input" name="kode" type="text" placeholder="Masukkan kode..." aria-label="Kode room" required />
						<button class="btn btn-primary" type="submit">Gabung</button>
					</form>
				</section>

				<section class="card create-card" aria-labelledby="create-title">
					<h2 class="card-heading" id="create-title"><span class="symbol">+</span>Buat Room</h2>
					<p class="card-description">Buat room baru</p>
					<a class="btn btn-primary" href="room-create.php">Buat</a>
				</section>
			</div>

			<div class="home-lower">
				<section class="card history-card" aria-labelledby="history-title">
					<h2 class="section-title" id="history-title">History Mengerjakan <a class="section-link" href="history.php">Lihat semua</a></h2>
					<a class="list-item" href="answer-question.php">
						<span class="status-icon" aria-hidden="true">&#10003;</span>
						<div class="item-copy"><p class="item-title">Evaluasi Pembelajaran</p><p class="item-subtitle">Budi Santoso</p></div>
						<span class="item-result">&#10003; Sudah Mengisi</span>
						<span class="room-card-link" aria-hidden="true">&#8250;</span>
					</a>
					<a class="list-item" href="answer-question.php">
						<span class="status-icon" aria-hidden="true">&#10003;</span>
						<div class="item-copy"><p class="item-title">Feedback Presentasi</p><p class="item-subtitle">Maya Putri</p></div>
						<span class="item-result">&#10003; Sudah Mengisi</span>
						<span class="room-card-link" aria-hidden="true">&#8250;</span>
					</a>
					<a class="list-item" href="answer-question.php">
						<span class="status-icon pending" aria-hidden="true">&#8635;</span>
						<div class="item-copy"><p class="item-title">Evaluasi Materi</p><p class="item-subtitle">Ahmad Fauzi</p></div>
						<span class="item-result pending">Belum Selesai Mengisi</span>
						<span class="room-card-link" aria-hidden="true">&#8250;</span>
					</a>
				</section>

				<section class="card rooms-card" aria-labelledby="rooms-title">
					<h2 class="section-title" id="rooms-title"><span class="section-title-link">Room Saya</span><a class="section-link" href="room-view.php">Lihat semua</a></h2>
					<a class="list-item" href="room-master/room-anonymous-feedback.php">
						<span class="room-icon" aria-hidden="true">&#9632;</span>
						<div class="item-copy"><p class="item-title">Evaluasi Matematika</p><p class="item-subtitle">3 peserta &nbsp; - &nbsp; <strong style="color: var(--purple)">14 respons</strong></p></div>
						<span class="room-card-link" aria-hidden="true">&#8250;</span>
					</a>
					<a class="list-item" href="room-master/room-anonymous-feedback.php">
						<span class="room-icon" aria-hidden="true">&#9632;</span>
						<div class="item-copy"><p class="item-title">Evaluasi PPKN</p><p class="item-subtitle">7 peserta &nbsp; - &nbsp; <strong style="color: var(--purple)">9 respons</strong></p></div>
						<span class="room-card-link" aria-hidden="true">&#8250;</span>
					</a>
				</section>
			</div>
		</main>
	</body>
</html>