<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<base href="../">
<title>FloFeed - Evaluasi Matematika</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php require __DIR__ . '/../components/navbar.php'; ?>

  <main class="room-page">

    <div class="page-header-row">
      <a class="back-btn" href="home.php" aria-label="Kembali">&#8249;</a>
      <div class="page-title-group">
        <h1>Evaluasi Matematika</h1>
        <p>Room Master &middot; Kode: EVL-2847</p>
      </div>
    </div>

   

    <div class="feedback-summary stat-grid">
      <div class="card stat-card">
        <div class="stat-icon icon-pink"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6" /></svg></div>
        <div class="stat-number">14</div>
        <div class="stat-label">Jumlah Peserta</div>
      </div>
      <div class="card stat-card">
        <div class="stat-icon icon-pink"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 6h14v10H9l-4 3V6Z" /></svg></div>
        <div class="stat-number">3</div>
        <div class="stat-label">Jumlah Feedback</div>
      </div>
      <div class="card stat-card">
        <div class="stat-icon icon-pink"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 5h12M6 12h12M6 19h12" /></svg></div>
        <div class="stat-number">41</div>
        <div class="stat-label">Jumlah Jawaban</div>
      </div>
    </div>

    <h2 class="feedback-section-title"><span class="feedback-title-mark" aria-hidden="true"></span>Daftar Feedback</h2>

    <div class="feedback-grid">
      <article class="feedback-card feedback-list-card">
        <div class="feedback-list-head">
          <h2>Feedback 1</h2>
        </div>
        <p class="feedback-preview">&quot;Bagaimana pendapatmu tentang pembelajaran yang berlangsung?&quot;</p>
        <a class="feedback-answer-link" href="room-master/room-anonymous-feedback.php">
          <span>14 jawaban</span>
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m9 18 6-6-6-6" /></svg>
        </a>
      </article>

      <article class="feedback-card feedback-list-card">
        <div class="feedback-list-head">
          <h2>Feedback 2</h2>
        </div>
        <p class="feedback-preview">&quot;Apa yang menurutmu perlu diperbaiki dari pembelajaran ini?&quot;</p>
        <a class="feedback-answer-link" href="room-master/room-anonymous-feedback.php">
          <span>14 jawaban</span>
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m9 18 6-6-6-6" /></svg>
        </a>
      </article>

      <article class="feedback-card feedback-list-card">
        <div class="feedback-list-head">
          <h2>Feedback 3</h2>
        </div>
        <p class="feedback-preview">&quot;Bagaimana pengalamanmu mengikuti pembelajaran hari ini?&quot;</p>
        <a class="feedback-answer-link" href="room-master/room-anonymous-feedback.php">
          <span>13 jawaban</span>
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m9 18 6-6-6-6" /></svg>
        </a>
      </article>
    </div>

  </main>

</body>
</html>