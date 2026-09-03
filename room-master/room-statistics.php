<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<base href="../">
<title>Evaluasi Matematika - Statistik</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php require __DIR__ . '/../components/navbar.php'; ?>

  <main class="room-page">
    <div class="page-header-row">
      <a class="back-btn" href="home.php" aria-label="Kembali">&larr;</a>
      <div class="page-title-group">
        <h1>Evaluasi Matematika</h1>
        <p>Room Master &middot; Kode: EVL-2847</p>
      </div>
      <span class="status-pill"><span class="state-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8.5" /><path d="M12 7v5l3 2" /></svg></span>Menunggu Syarat</span>
    </div>

   <nav class="room-tabs" aria-label="Navigasi room">
      <a class="room-tab" href="room-master/room-anonymous-feedback.php">
        <span class="tab-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 6h14v10H9l-4 3V6Z" /></svg></span> Feedback Anonim
      </a>
      <a class="room-tab" href="room-master/room-participant-status.php">
        <span class="tab-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="8" r="3" /><path d="M3 19c.4-2.8 2.4-4.5 6-4.5s5.6 1.7 6 4.5M16 5.5a3 3 0 0 1 0 5.8M17 15.7c2.3.5 3.6 2 4 4.3" /></svg></span> Status Peserta
      </a>
      <a class="room-tab active" href="room-master/room-statistics.php">
        <span class="tab-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 19V9M12 19V5M19 19v-7" /></svg></span> Statistik
      </a>
      <a class="room-tab" href="room-master/room-waiting-requirements.php">
        <span class="tab-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8.5" /><path d="M12 7v5l3 2" /></svg></span> Menunggu Syarat
      </a>
    </nav>

    <!-- Statistics content -->
    <div class="content">
    <!-- Left: Donut chart -->
    <div class="card chart-card">
      <div class="chart-title">Tingkat Partisipasi</div>
      <div class="donut-wrap">
        <svg width="140" height="140" viewBox="0 0 140 140">
          <circle cx="70" cy="70" r="55" fill="none" stroke="#e9e9f3" stroke-width="16" />
          <circle cx="70" cy="70" r="55" fill="none" stroke="#ec008c" stroke-width="16"
                  stroke-dasharray="241.9 345.6" stroke-dashoffset="86.4"
                  stroke-linecap="round" transform="rotate(-90 70 70)" />
        </svg>
      </div>
      <div class="legend">
        <div class="legend-row">
          <div class="legend-label"><span class="dot dot-purple"></span>Sudah Mengisi</div>
          <div class="legend-value">14</div>
        </div>
        <div class="legend-row">
          <div class="legend-label"><span class="dot dot-gray"></span>Belum Mengisi</div>
          <div class="legend-value">6</div>
        </div>
      </div>
    </div>

    <!-- Right column -->
    <div class="right-col">

      <div class="stat-grid">
        <div class="card stat-card">
          <div class="stat-icon icon-purple">&#128101;</div>
          <div class="stat-number">20</div>
          <div class="stat-label">Total Peserta</div>
        </div>
        <div class="card stat-card">
          <div class="stat-icon icon-green">&#10003;</div>
          <div class="stat-number">14</div>
          <div class="stat-label">Sudah Mengisi</div>
        </div>
        <div class="card stat-card">
          <div class="stat-icon icon-yellow">&#128337;</div>
          <div class="stat-number">6</div>
          <div class="stat-label">Belum Mengisi</div>
        </div>
        <div class="card stat-card">
          <div class="stat-icon icon-blue">&#128172;</div>
          <div class="stat-number">14</div>
          <div class="stat-label">Total Feedback</div>
        </div>
      </div>

      <div class="card progress-card">
        <div class="progress-header">
          <div class="progress-title">Partisipasi</div>
          <div class="progress-percent">70%</div>
        </div>
        <div class="progress-bar-bg">
          <div class="progress-bar-fill"></div>
        </div>
        <div class="progress-footer">
          <span>0 peserta</span>
          <span>14 dari 20 peserta</span>
        </div>
      </div>

    </div>

    </div>
  </main>

</body>
</html>