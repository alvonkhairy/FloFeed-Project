<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<base href="../">
<title>FloFeed - Jawaban Feedback 1</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php require __DIR__ . '/../components/navbar.php'; ?>

  <main class="room-page feedback-answer-page">
    <div class="page-header-row">
      <a class="back-btn" href="room-master/room-anonymous-home.php" aria-label="Kembali ke daftar feedback">&#8249;</a>
      <div class="page-title-group">
        <h1>Feedback 1</h1>
        <p>Daftar jawaban anonim</p>
      </div>
    </div>

    <section class="feedback-answer-question card" aria-labelledby="feedback-question-title">
      <div class="feedback-answer-label">Pertanyaan</div>
      <h2 id="feedback-question-title">Bagaimana pendapatmu tentang pembelajaran yang berlangsung?</h2>
      <div class="feedback-answer-count">14 jawaban</div>
    </section>

    <section class="feedback-responses" aria-labelledby="feedback-responses-title">
      <h2 class="feedback-section-title" id="feedback-responses-title"><span class="feedback-title-mark" aria-hidden="true"></span>Jawaban Masuk</h2>

      <article class="feedback-response card">
        <div class="feedback-response-number">Jawaban 1</div>
        <p>Materinya sudah jelas dan mudah dipahami.</p>
      </article>
      <article class="feedback-response card">
        <div class="feedback-response-number">Jawaban 2</div>
        <p>Waktu diskusi bisa ditambah agar lebih banyak yang dapat bertanya.</p>
      </article>
      <article class="feedback-response card">
        <div class="feedback-response-number">Jawaban 3</div>
        <p>Tambahkan lebih banyak contoh soal agar lebih mudah dimengerti.</p>
      </article>
      <article class="feedback-response card">
        <div class="feedback-response-number">Jawaban 4</div>
        <p>Penjelasan sudah bagus dan membantu memahami materi.</p>
      </article>
    </section>
  </main>

</body>
</html>
