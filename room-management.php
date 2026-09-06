<?php
session_start(); // jalankan session //
require_once __DIR__ . '/koneksi.php'; // hubungkan file koneksi dan database//

// kalau belum login/tidak ada session, akan dilempar ke login //
if (!isset($_SESSION['user_id'])) {
	header('Location: login.php');
	exit;
}

// proses hapus room //
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
	$deleteStmt = $pdo->prepare('DELETE FROM rooms WHERE id = :id AND user_id = :user_id');
	$deleteStmt->execute([
		'id' => $_POST['delete_id'],
		'user_id' => $_SESSION['user_id'],
	]);
}

$roomStmt = $pdo->prepare(
	'SELECT rooms.id, rooms.title, rooms.room_code, rooms.created_at,
			COUNT(DISTINCT room_participants.id) AS participant_count,
			COUNT(DISTINCT answers.id) AS answer_count
	 FROM rooms
	 LEFT JOIN room_participants ON room_participants.room_id = rooms.id
	 LEFT JOIN questions ON questions.room_id = rooms.id
	 LEFT JOIN answers ON answers.question_id = questions.id
	 WHERE rooms.user_id = :user_id
	 GROUP BY rooms.id, rooms.title, rooms.room_code, rooms.created_at
	 ORDER BY rooms.created_at DESC'
);
$roomStmt->execute(['user_id' => $_SESSION['user_id']]);
$rooms = $roomStmt->fetchAll();
?>
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
				<?php foreach ($rooms as $room): ?>
					<div class="list-item">
						<span class="room-icon" aria-hidden="true">&#9632;</span>
						<div class="item-copy">
							<p class="item-title"><a href="room-master/room-anonymous-home.php?id=<?php echo $room['id']; ?>"><?php echo htmlspecialchars($room['title'], ENT_QUOTES, 'UTF-8'); ?></a></p>
							<p class="item-subtitle">Kode: <strong><?php echo htmlspecialchars($room['room_code'], ENT_QUOTES, 'UTF-8'); ?></strong> &nbsp; - &nbsp; <?php echo $room['participant_count']; ?> peserta &nbsp; - &nbsp; <strong style="color: var(--purple)"><?php echo $room['answer_count']; ?> respons</strong></p>
						</div>
						<a class="btn btn-secondary" href="room-create.php?id=<?php echo $room['id']; ?>">Edit</a>
						<form method="post" onsubmit="return confirm('Hapus room ini?');">
							<input type="hidden" name="delete_id" value="<?php echo $room['id']; ?>">
							<button class="btn btn-secondary" type="submit">Hapus</button>
						</form>
					</div>
				<?php endforeach; ?>
				<?php if (count($rooms) === 0): ?>
					<p>Belum ada room.</p>
				<?php endif; ?>
			</section>
		</main>
	</body>
</html>