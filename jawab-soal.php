<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FloFeed - Evaluasi Pembelajaran</title>
<link rel="stylesheet" href="assets/css/style.css">
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

  <!-- Main content -->
  <main class="page answer-page">

    <!-- Title card -->
    <div class="card title-card">
      <div>
        <div class="title-main">Evaluasi Pembelajaran</div>
        <div class="title-sub">Dibuat oleh Budi Santoso &middot; 23 peserta</div>
      </div>
      <div class="badge-anonim">&#128274; Feedback anonim</div>
    </div>

    <!-- Question 1 -->
    <div class="card">
      <div class="question-header">
        <div class="question-number">1</div>
        <div class="question-text">Bagaimana menurutmu materi hari ini?</div>
      </div>
      <textarea class="answer-box" placeholder="Tulis jawabanmu di sini..."></textarea>
    </div>

    <!-- Question 2 -->
    <div class="card">
      <div class="question-header">
        <div class="question-number">2</div>
        <div class="question-text">Apa saran untuk perbaikan?</div>
      </div>
      <textarea class="answer-box" placeholder="Tulis jawabanmu di sini..."></textarea>
    </div>

    <!-- Notice -->
    <div class="notice">&#128274; Identitas Anda tidak akan diketahui oleh siapapun</div>

    <!-- Buttons -->
    <div class="button-row">
      <a class="btn btn-cancel" href="home.php">Batal</a>
      <a class="btn btn-submit" href="terimakasih.php">&#9992; Kirim Feedback</a>
    </div>

  </main>

</body>
</html>
