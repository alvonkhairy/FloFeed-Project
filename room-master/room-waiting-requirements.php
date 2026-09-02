<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FloFeed - Evaluasi Matematika</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<?php require __DIR__ . '/../components/navbar.php'; ?>
  <main class="room-page">

    <section class="room-heading">
      <a class="room-back" href="../home.php" aria-label="Kembali">&larr;</a>
      <div class="room-title">
        <h1>Evaluasi Matematika</h1>
        <p>Room Master &middot; Kode: EVL-2847</p>
      </div>
      <span class="room-state"><span class="state-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8.5" /><path d="M12 7v5l3 2" /></svg></span>Menunggu Syarat</span>
    </section>

    <nav class="room-tabs" aria-label="Navigasi room">
      <a class="room-tab" href="room-anonymous-feedback.php">
        <span class="tab-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 6h14v10H9l-4 3V6Z" /></svg></span> Feedback Anonim
      </a>
      <a class="room-tab" href="room-participant-status.php">
        <span class="tab-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="8" r="3" /><path d="M3 19c.4-2.8 2.4-4.5 6-4.5s5.6 1.7 6 4.5M16 5.5a3 3 0 0 1 0 5.8M17 15.7c2.3.5 3.6 2 4 4.3" /></svg></span> Status Peserta
      </a>
      <a class="room-tab" href="room-statistics.php">
        <span class="tab-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 19V9M12 19V5M19 19v-7" /></svg></span> Statistik
      </a>
      <a class="room-tab active" href="room-waiting-requirements.php">
        <span class="tab-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8.5" /><path d="M12 7v5l3 2" /></svg></span> Menunggu Syarat
      </a>
    </nav>

    <div class="waiting-card">
      <div class="waiting-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8.5" /><path d="M12 7v5l3 2" /></svg></div>
      <h2 class="waiting-title">Feedback Sedang Diproses</h2>
      <p class="waiting-subtitle">Menunggu syarat terpenuhi sebelum feedback ditampilkan</p>

      <div class="progress-block">
        <div class="progress-head">
          <span class="progress-label"><span class="icon">&#128337;</span> 30 Menit</span>
          <span class="progress-status">Menunggu</span>
        </div>
        <div class="progress-track">
          <div class="progress-fill" style="width: 45%;"></div>
        </div>
        <p class="progress-note">13 menit 27 detik berlalu dari 30 menit</p>
      </div>

      <div class="progress-block">
        <div class="progress-head">
          <span class="progress-label"><span class="icon">&#128101;</span> 5 Peserta</span>
          <span class="progress-status">3/5 peserta</span>
        </div>
        <div class="progress-track">
          <div class="progress-fill" style="width: 60%;"></div>
        </div>
        <div class="participant-avatars">
          <span class="p-avatar filled">&#128100;</span>
          <span class="p-avatar filled">&#128100;</span>
          <span class="p-avatar filled">&#128100;</span>
          <span class="p-avatar empty">&#128100;</span>
          <span class="p-avatar empty">&#128100;</span>
        </div>
      </div>
    </div>

    <div class="status-box">
      <span class="icon">&#128274;</span>
      <div>
        <p class="title">Status Publikasi</p>
        <p class="desc">Menunggu Syarat... Isi feedback terlihat, identitas pengirim tidak terlihat.</p>
      </div>
    </div>

  </main>

</body>
</html>