<!doctype html>
<html lang="id">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>FloFeed - History Mengerjakan</title>
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