<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FloFeed - Evaluasi Matematika</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

  <?php
  require_once __DIR__ . '/../component/navbar.php';
  renderNavbar('..');
  ?>

  <main class="room-page">

    <div class="page-header-row">
      <a class="back-btn" href="../home.php" aria-label="Kembali">&larr;</a>
      <div class="page-title-group">
        <h1>Evaluasi Matematika</h1>
        <p>Room Master &middot; Kode: EVL-2847</p>
      </div>
      <span class="status-pill"><span class="state-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8.5" /><path d="M12 7v5l3 2" /></svg></span>Menunggu Syarat</span>
    </div>

    <?php
    require_once __DIR__ . '/../component/navigation-room-master.php';
    renderRoomMasterNavigation('..', 'index');
    ?>

    <div class="feedback-grid">

      <div class="feedback-card">
        <div class="feedback-head">
          <div class="feedback-author">
            <span class="author-avatar">&#128100;</span>
            <div>
              <p class="author-name">Anonymous</p>
              <p class="author-time">Beberapa saat lalu</p>
            </div>
          </div>
          <span class="status-dot">&#10003;</span>
        </div>
        <div class="feedback-body">Materinya sudah jelas dan mudah dipahami.</div>
      </div>

      <div class="feedback-card">
        <div class="feedback-head">
          <div class="feedback-author">
            <span class="author-avatar">&#128100;</span>
            <div>
              <p class="author-name">Anonymous</p>
              <p class="author-time">Beberapa saat lalu</p>
            </div>
          </div>
          <span class="status-dot">&#10003;</span>
        </div>
        <div class="feedback-body">Waktu diskusi bisa ditambah, saya rasa masih banyak yang ingin bertanya.</div>
      </div>

      <div class="feedback-card">
        <div class="feedback-head">
          <div class="feedback-author">
            <span class="author-avatar">&#128100;</span>
            <div>
              <p class="author-name">Anonymous</p>
              <p class="author-time">Beberapa saat lalu</p>
            </div>
          </div>
          <span class="status-dot">&#10003;</span>
        </div>
        <div class="feedback-body">Tambahkan lebih banyak contoh soal agar lebih mudah dimengerti.</div>
      </div>

      <div class="feedback-card">
        <div class="feedback-head">
          <div class="feedback-author">
            <span class="author-avatar">&#128100;</span>
            <div>
              <p class="author-name">Anonymous</p>
              <p class="author-time">Beberapa saat lalu</p>
            </div>
          </div>
          <span class="status-dot">&#10003;</span>
        </div>
        <div class="feedback-body">Penjelasan sudah bagus, tapi slide presentasi bisa dibuat lebih menarik.</div>
      </div>

    </div>

  </main>

</body>
</html>