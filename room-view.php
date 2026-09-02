<!doctype html>
<html lang="id">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>FloFeed - Room Saya</title>
		<link rel="stylesheet" href="assets/css/style.css" />
	</head>
	<body>
		<header class="topbar">
			<a class="brand" href="home.php" aria-label="FloFeed home">
				<span class="brand-name">FloFeed</span>
			</a>

			<details class="account">
				<summary class="account-trigger">
					<span class="avatar">UN</span>
					<span class="account-name">Upik Nambo</span>
					<span class="chevron" aria-hidden="true">&#9662;</span>
				</summary>
				<div class="account-panel">
					<div class="account-info">
						<p class="name">Upik Nambo</p>
						<p class="email">upik@email.com</p>
					</div>
					<div class="account-divider"></div>
					<a class="logout-btn" href="login.php">Logout</a>
				</div>
			</details>
		</header>

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