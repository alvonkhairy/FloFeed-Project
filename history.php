<!doctype html>
<html lang="id">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>FloFeed - History Mengerjakan</title>
		<link rel="stylesheet" href="assets/css/style.css" />
	</head>
	<body>
		<?php
		require_once __DIR__ . '/component/navbar.php';
		renderNavbar('.');
		?>

		<main class="page history-page">
			<header class="page-header">
				<a class="back-btn" href="home.php" aria-label="Kembali ke home">&#8249;</a>
				<div class="page-title-group">
					<h1>History Mengerjakan</h1>
					<p>Daftar semua evaluasi yang pernah kamu ikuti</p>
				</div>
			</header>

			<section class="card history-list-card" aria-labelledby="history-list-title">
				<h2 class="section-title" id="history-list-title">Semua Aktivitas</h2>

				<a class="list-item" href="jawab-soal.php">
					<span class="status-icon" aria-hidden="true">&#10003;</span>
					<div class="item-copy"><p class="item-title">Evaluasi Pembelajaran</p><p class="item-subtitle">Budi Santoso</p></div>
					<span class="item-result">&#10003; Sudah Mengisi</span>
					<span class="room-card-link" aria-hidden="true">&#8250;</span>
				</a>
				<a class="list-item" href="jawab-soal.php">
					<span class="status-icon" aria-hidden="true">&#10003;</span>
					<div class="item-copy"><p class="item-title">Feedback Presentasi</p><p class="item-subtitle">Maya Putri</p></div>
					<span class="item-result">&#10003; Sudah Mengisi</span>
					<span class="room-card-link" aria-hidden="true">&#8250;</span>
				</a>
				<a class="list-item" href="jawab-soal.php">
					<span class="status-icon pending" aria-hidden="true">&#8635;</span>
					<div class="item-copy"><p class="item-title">Evaluasi Materi</p><p class="item-subtitle">Ahmad Fauzi</p></div>
					<span class="item-result pending">Belum Selesai Mengisi</span>
					<span class="room-card-link" aria-hidden="true">&#8250;</span>
				</a>
				<a class="list-item" href="jawab-soal.php">
					<span class="status-icon" aria-hidden="true">&#10003;</span>
					<div class="item-copy"><p class="item-title">Evaluasi Matematika</p><p class="item-subtitle">Siti Rahma</p></div>
					<span class="item-result">&#10003; Sudah Mengisi</span>
					<span class="room-card-link" aria-hidden="true">&#8250;</span>
				</a>
				<a class="list-item" href="jawab-soal.php">
					<span class="status-icon pending" aria-hidden="true">&#8635;</span>
					<div class="item-copy"><p class="item-title">Review Proyek Kelompok</p><p class="item-subtitle">Dewi Lestari</p></div>
					<span class="item-result pending">Belum Selesai Mengisi</span>
					<span class="room-card-link" aria-hidden="true">&#8250;</span>
				</a>
			</section>
		</main>
	</body>
</html>