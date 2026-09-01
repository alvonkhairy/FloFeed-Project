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

    <section class="room-heading">
      <a class="room-back" href="../home.php" aria-label="Kembali">&larr;</a>
      <div class="room-title">
        <h1>Evaluasi Matematika</h1>
        <p>Room Master &middot; Kode: EVL-2847</p>
      </div>
      <span class="room-state"><span class="state-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8.5" /><path d="M12 7v5l3 2" /></svg></span>Menunggu Syarat</span>
    </section>

    <?php
    require_once __DIR__ . '/../component/navigation-room-master.php';
    renderRoomMasterNavigation('..', 'menunggu-syarat');
    ?>

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