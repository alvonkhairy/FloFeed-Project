<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FloFeed-buat soal</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php
    require_once __DIR__ . '/component/navbar.php';
    renderNavbar('.');
    ?>

    <main class ="page">
        <div class="page-header">
            <a class="back-btn" href="home.php" aria-label="Kembali">&larr;</a>
            <div class="page-title-group">
                <h1>Buat Room Baru</h1>
                <p>Rancang pertanyaan untuk peserta Anda</p>
            </div>
        </div>

        <section class="card">
            <label class="field-label" for="judul-room">Judul Room</label>
            <input class="text-input" id="judul-room" type="text" value="Evaluasi Pembelajaran Hari Ini">
        </section>

        <section class="card question-card">
            <div class="question-head">
                <span class="pill pill-purple">Pertanyaan 1</span>
                <span class="pill pill-grey">Teks Bebas</span>
            </div>
            <input class="text-input" type="text" value="bagaimana menurutmu materi hari ini?">
            <input class="text-input placeholder-input" type="text" placeholder="Peserta akan mengetik jawaban di sini...">
        </section>

        <section class="card question-card">
            <div class="question-head">
                <span class="pill pill-purple">Pertanyaan 2</span>
                <span class="pill pill-grey">Teks Bebas</span>
            </div>
            <input class="text-input" type="text" value="Apa saran untuk perbaikan?">
            <input class="text-input placeholder-input" type="text" placeholder="Peserta akan mengetik jawaban di sini...">
        </section>

        <button class="add-question-btn">
            <span class="plus">+</span>Tambah Pertanyaan
        </button>

        <div class="actions">
            <a class="btn btn-secondary" href="home.php">Batal</a>
            <a class="btn btn-primary" href="kondisi-publikasi.php">Simpan<span class="arrow">&rarr;</span></a>
        </div>
    </main>

</body>
</html>