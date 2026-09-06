<?php
session_start(); // jalankan session //
require_once __DIR__ . '/koneksi.php'; // hubungkan file koneksi //

// kalau belum login/tidak ada session, akan dilempar ke login //
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// ambil nama user dari database berdasarkan user_id yang tersimpan di session //
$stmt = $pdo->prepare('SELECT name, email FROM users WHERE user_id = :user_id LIMIT 1');
$stmt->execute(['user_id' => $_SESSION['user_id']]);
$user = $stmt->fetch();

// Kalau $user kosong (datanya sudah terhapus dari database), pakai nilai default 'User' dan 'user@example.com' biar halaman tidak error.//
$username = $user['name'] ?? 'User';
$email = $user['email'] ?? 'user@example.com';

// ambil history room yang pernah diikuti user //
$historyStmt = $pdo->prepare(
    'SELECT rooms.title, rooms.room_code, room_participants.status,
            users.name AS creator_name, COUNT(answers.id) AS answer_count
     FROM room_participants
     INNER JOIN rooms ON rooms.id = room_participants.room_id
     INNER JOIN users ON users.user_id = rooms.user_id
     LEFT JOIN answers ON answers.room_participant_id = room_participants.id
     WHERE room_participants.user_id = :user_id
     GROUP BY rooms.id, rooms.title, rooms.room_code, room_participants.status, users.name,
              room_participants.submitted_at, room_participants.joined_at
     ORDER BY COALESCE(room_participants.submitted_at, room_participants.joined_at) DESC
     LIMIT 3'
);
$historyStmt->execute(['user_id' => $_SESSION['user_id']]);
$historyRooms = $historyStmt->fetchAll();
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
				<h1 id="welcome-title">Selamat Pagi, <?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?></h1>
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
								<p class="item-subtitle">Dibuat oleh <?php echo htmlspecialchars($historyRoom['creator_name'], ENT_QUOTES, 'UTF-8'); ?> &middot; <?php echo $historyRoom['answer_count']; ?> jawaban</p>
							</div>
							<span class="item-result<?php echo $isComplete ? '' : ' pending'; ?>">
								<?php echo $isComplete ? 'Sudah Mengisi' : 'Belum Selesai Mengisi'; ?>
							</span>
							<span class="room-card-link" aria-hidden="true">&#8250;</span>
						</a>
					<?php endforeach; ?>

					<?php if (count($historyRooms) === 0): ?>
						<p>Belum ada room yang kamu kerjakan.</p>
					<?php endif; ?>
				</section>
			</div>
		</main>
	</body>
</html>
