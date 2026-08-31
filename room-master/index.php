<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FloFeed - Evaluasi Matematika</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

  <header class="topbar">
    <a class="brand" href="../home.php" aria-label="FloFeed home">
      <span class="brand-name">FloFeed</span>
    </a>

    <details class="account">
      <summary class="account-trigger">
        <span class="avatar">UN</span>
        <span class="account-name">Upik Nambo</span>
        <span class="chevron">&#9662;</span>
      </summary>

      <div class="account-panel">
        <div class="account-info">
            <p class="name">Upik Nambo</p>
            <p class="email">upik@email.com</p>
        </div>
        <div class="account-divider"></div>
        <a class="logout-btn" href="../login.php">Logout</a>
      </div>
    </details>
  </header>

  <main class="room-page">

    <div class="page-header-row">
      <a class="back-btn" href="../home.php" aria-label="Kembali">&larr;</a>
      <div class="page-title-group">
        <h1>Evaluasi Matematika</h1>
        <p>Room Master &middot; Kode: EVL-2847</p>
      </div>
      <span class="status-pill"><span class="state-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8.5" /><path d="M12 7v5l3 2" /></svg></span>Menunggu Syarat</span>
    </div>

    <nav class="room-tabs" aria-label="Navigasi room">
      <a class="room-tab active" href="index.php">
        <span class="tab-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 6h14v10H9l-4 3V6Z" /></svg></span> Feedback Anonim
      </a>
      <a class="room-tab" href="status-peserta.php">
        <span class="tab-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="8" r="3" /><path d="M3 19c.4-2.8 2.4-4.5 6-4.5s5.6 1.7 6 4.5M16 5.5a3 3 0 0 1 0 5.8M17 15.7c2.3.5 3.6 2 4 4.3" /></svg></span> Status Peserta
      </a>
      <a class="room-tab" href="statistik.php">
        <span class="tab-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 19V9M12 19V5M19 19v-7" /></svg></span> Statistik
      </a>
      <a class="room-tab" href="menunggu-syarat.php">
        <span class="tab-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8.5" /><path d="M12 7v5l3 2" /></svg></span> Menunggu Syarat
      </a>
    </nav>

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