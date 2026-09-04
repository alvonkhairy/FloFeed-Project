<?php
session_start();
require_once __DIR__ . '/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$stmt = $pdo->prepare('SELECT name, email FROM users WHERE user_id = :user_id LIMIT 1');
$stmt->execute(['user_id' => $_SESSION['user_id']]);
$user = $stmt->fetch();

$username = $user['name'] ?? 'User';
$email = $user['email'] ?? 'user@example.com';
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
	<body class="home">
<?php require __DIR__ . '/components/navbar.php'; ?>

		<main class="home-page">
			<section class="welcome" aria-labelledby="welcome-title">
				<h1 id="welcome-title">Selamat Pagi Gaes, &#128075;</h1>
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
			</div>

			<div class="home-lower">
				<section class="card history-card" aria-labelledby="history-title">
					<h2 class="section-title" id="history-title">History Mengerjakan <a class="section-link" href="history.php">Lihat semua</a></h2>
					<a class="list-item" href="answer-question.php">
						<span class="status-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m5 12 4 4L19 6" /></svg></span>
						<div class="item-copy"><p class="item-title">Evaluasi Pembelajaran</p><p class="item-subtitle">Budi Santoso</p></div>
						<span class="item-result"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6" /></svg>Sudah Mengisi</span>
						<span class="room-card-link" aria-hidden="true">&#8250;</span>
					</a>
					<a class="list-item" href="answer-question.php">
						<span class="status-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m5 12 4 4L19 6" /></svg></span>
						<div class="item-copy"><p class="item-title">Feedback Presentasi</p><p class="item-subtitle">Maya Putri</p></div>
						<span class="item-result"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6" /></svg>Sudah Mengisi</span>
						<span class="room-card-link" aria-hidden="true">&#8250;</span>
					</a>
					<a class="list-item" href="answer-question.php">
						<span class="status-icon pending" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8.5" /><path d="M12 7v5l3 2" /></svg></span>
						<div class="item-copy"><p class="item-title">Evaluasi Materi</p><p class="item-subtitle">Ahmad Fauzi</p></div>
						<span class="item-result pending"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8.5" /><path d="M12 7v5l3 2" /></svg>Belum Selesai Mengisi</span>
						<span class="room-card-link" aria-hidden="true">&#8250;</span>
					</a>
				</section>

				
			</div>
		</main>
	</body>
</html>