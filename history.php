<?php
session_start(); // jalankan session //
require_once __DIR__ . '/koneksi.php'; // hubungkan file koneksi dan database //

// kalau belum login/tidak ada session, akan dilempar ke login //
if (!isset($_SESSION['user_id'])) {
	header('Location: login.php');
	exit;
}

// ambil semua room yang pernah dikerjakan user dari database //
$historyStmt = $pdo->prepare(
	'SELECT rooms.id, rooms.title, rooms.room_code, room_participants.status,
			users.name AS creator_name
	 FROM room_participants
	 INNER JOIN rooms ON rooms.id = room_participants.room_id
	 INNER JOIN users ON users.user_id = rooms.user_id
	 WHERE room_participants.user_id = :user_id
	 ORDER BY COALESCE(room_participants.submitted_at, room_participants.joined_at) DESC'
);
$historyStmt->execute(['user_id' => $_SESSION['user_id']]);
$historyRooms = $historyStmt->fetchAll();
?>
<!doctype html>
<html lang="id">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>FloFeed - History Mengerjakan</title>
		<link rel="stylesheet" href="assets/css/style.css" />
	</head>
	<body>
<?php require __DIR__ . '/components/navbar.php'; ?>

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

				<?php foreach ($historyRooms as $historyRoom): ?>
					<?php $isComplete = $historyRoom['status'] === 'sudah_mengisi'; ?>
					<a class="list-item" href="answer-question.php?kode=<?php echo urlencode($historyRoom['room_code']); ?>">
						<span class="status-icon<?php echo $isComplete ? '' : ' pending'; ?>" aria-hidden="true">
							<?php if ($isComplete): ?>
								<svg viewBox="0 0 24 24"><path d="m5 12 4 4L19 6" /></svg>
							<?php else: ?>
								<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8.5" /><path d="M12 7v5l3 2" /></svg>
							<?php endif; ?>
						</span>
						<div class="item-copy">
							<p class="item-title"><?php echo htmlspecialchars($historyRoom['title'], ENT_QUOTES, 'UTF-8'); ?></p>
							<p class="item-subtitle">Dibuat oleh <?php echo htmlspecialchars($historyRoom['creator_name'], ENT_QUOTES, 'UTF-8'); ?></p>
						</div>
						<span class="item-result<?php echo $isComplete ? '' : ' pending'; ?>">
							<?php if ($isComplete): ?>
								<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6" /></svg>Sudah Mengisi
							<?php else: ?>
								<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8.5" /><path d="M12 7v5l3 2" /></svg>Belum Selesai Mengisi
							<?php endif; ?>
						</span>
						<span class="room-card-link" aria-hidden="true">&#8250;</span>
					</a>
				<?php endforeach; ?>

				<?php if (count($historyRooms) === 0): ?>
					<p>Belum ada room yang kamu kerjakan.</p>
				<?php endif; ?>
			</section>
		</main>
	</body>
</html>