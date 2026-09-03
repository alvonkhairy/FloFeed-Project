<!doctype html>
<html lang="id">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>FloFeed - Room Saya</title>
		<link rel="stylesheet" href="assets/css/style.css" />
	</head>
	<body class="room-view">
<?php require __DIR__ . '/components/navbar.php'; ?>

		<main class="home-page rooms-page">
			<section class="welcome room-management-header" aria-labelledby="rooms-title">
				<div class="room-management-copy">
					<h1 id="rooms-title">Room Saya</h1>
					<p>Kelola dan lihat semua room yang kamu buat</p>
				</div>
				<a class="btn btn-primary create-room-btn" href="room-create.php">Buat room baru</a>
			</section>

			<section class="card rooms-list-card" aria-labelledby="rooms-list-title">
				<h2 class="section-title" id="rooms-list-title">Semua Room</h2>
				<a class="list-item" href="room-master/room-statistics.php">
					<span class="room-icon" aria-hidden="true">&#9632;</span>
					<div class="item-copy"><p class="item-title">Evaluasi Matematika</p><p class="item-subtitle">3 peserta &nbsp; - &nbsp; <strong style="color: var(--purple)">14 respons</strong></p></div>
					<span class="room-card-link" aria-hidden="true">&#8250;</span>
				</a>
				<a class="list-item" href="room-master/room-statistics.php">
					<span class="room-icon" aria-hidden="true">&#9632;</span>
					<div class="item-copy"><p class="item-title">Evaluasi PPKN</p><p class="item-subtitle">7 peserta &nbsp; - &nbsp; <strong style="color: var(--purple)">9 respons</strong></p></div>
					<span class="room-card-link" aria-hidden="true">&#8250;</span>
				</a>
			</section>
		</main>
	</body>
</html>