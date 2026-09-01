<!doctype html>
<html lang="id">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>FloFeed - Room Saya</title>
		<link rel="stylesheet" href="assets/css/style.css" />
	</head>
	<body>
		<?php
		require_once __DIR__ . '/component/navbar.php';
		renderNavbar('.');
		?>

		<main class="page rooms-page">
			<header class="page-header">
				<a class="back-btn" href="home.php" aria-label="Kembali ke home">&#8249;</a>
				<div class="page-title-group">
					<h1>Room Saya</h1>
					<p>Kelola dan lihat semua room yang kamu buat</p>
				</div>
			</header>

			<section class="card rooms-list-card" aria-labelledby="rooms-list-title">
				<h2 class="section-title" id="rooms-list-title">Semua Room</h2>
				<a class="list-item" href="room-master/statistik.php">
					<span class="room-icon" aria-hidden="true">&#9632;</span>
					<div class="item-copy"><p class="item-title">Evaluasi Matematika</p><p class="item-subtitle">3 peserta &nbsp; - &nbsp; <strong style="color: var(--purple)">14 respons</strong></p></div>
					<span class="room-card-link" aria-hidden="true">&#8250;</span>
				</a>
				<a class="list-item" href="room-master/statistik.php">
					<span class="room-icon" aria-hidden="true">&#9632;</span>
					<div class="item-copy"><p class="item-title">Evaluasi PPKN</p><p class="item-subtitle">7 peserta &nbsp; - &nbsp; <strong style="color: var(--purple)">9 respons</strong></p></div>
					<span class="room-card-link" aria-hidden="true">&#8250;</span>
				</a>
			</section>
		</main>
	</body>
</html>