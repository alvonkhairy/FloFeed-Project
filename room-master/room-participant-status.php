<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Status Peserta - FloFeed</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
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
        <span class="room-state"
          ><span class="state-icon"
            ><svg viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="8.5" />
              <path d="M12 7v5l3 2" /></svg></span
          >Menunggu Syarat</span
        >
      </section>

      <nav class="room-tabs" aria-label="Navigasi room">
        <a class="room-tab" href="room-anonymous-feedback.php"
          >
		  <span class="tab-icon"
            >
			<svg viewBox="0 0 24 24">
              <path d="M5 6h14v10H9l-4 3V6Z" /></svg></span
          >Feedback Anonim</a
        >
        <a class="room-tab active" href="room-participant-status.php"
          >
		  <span class="tab-icon"
            >
			<svg viewBox="0 0 24 24">
              <circle cx="9" cy="8" r="3" />
              <path
                d="M3 19c.4-2.8 2.4-4.5 6-4.5s5.6 1.7 6 4.5M16 5.5a3 3 0 0 1 0 5.8M17 15.7c2.3.5 3.6 2 4 4.3"
              /></svg></span
          >Status Peserta</a
        >
        <a class="room-tab" href="room-statistics.php"
          >
		  <span class="tab-icon"
            >
			<svg viewBox="0 0 24 24">
              <path d="M5 19V9M12 19V5M19 19v-7" /></svg></span
          >Statistik</a
        >
        <a class="room-tab" href="room-waiting-requirements.php"
          >
		  <span class="tab-icon"
            >
			<svg viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="8.5" />
              <path d="M12 7v5l3 2" /></svg></span
          >Menunggu Syarat</a
        >
      </nav>

      <section class="participant-card" aria-labelledby="participant-title">
        <div class="participant-head" id="participant-title">
          <span>Peserta</span><span>Status</span><span>Waktu</span>
        </div>
        <div class="participant-row">
          <span class="participant-name"
            >
			<span class="participant-avatar">A</span>Peserta A</span
          >
		  <span class="status-badge complete"
            >
			<svg viewBox="0 0 24 24"><path d="m5 12 4 4L19 6" /></svg>Sudah
            Mengisi</span
          ><time>14:23</time>
        </div>
        <div class="participant-row">
          <span class="participant-name"
            >
			<span class="participant-avatar">B</span>Peserta B</span
          >
		  <span class="status-badge complete"
            ><svg viewBox="0 0 24 24"><path d="m5 12 4 4L19 6" /></svg>Sudah
            Mengisi</span
          >
		  <time>14:31</time>
        </div>
        <div class="participant-row">
          <span class="participant-name"
            >
			<span class="participant-avatar">C</span>Peserta C</span
          >
		  <span class="status-badge pending"
            >
			<svg viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="8.5" />
              <path d="M12 7v5l3 2" /></svg
            >Belum Mengisi</span
          >
		  <time>&mdash;</time>
        </div>
        <div class="participant-row">
          <span class="participant-name"
            >
			<span class="participant-avatar">D</span>Peserta D</span
          >
		  <span class="status-badge complete"
            >
			<svg viewBox="0 0 24 24"><path d="m5 12 4 4L19 6" /></svg>Sudah
            Mengisi</span
          >
		  <time>14:45</time>
        </div>
        <div class="participant-row">
          <span class="participant-name"
            >
			<span class="participant-avatar">E</span>Peserta E</span
          >
		  <span class="status-badge complete"
            >
			<svg viewBox="0 0 24 24"><path d="m5 12 4 4L19 6" /></svg>Sudah
            Mengisi</span
          >
		  <time>14:52</time>
        </div>
        <div class="participant-row">
          <span class="participant-name"
            >
			<span class="participant-avatar">F</span>Peserta F</span
          >
		  <span class="status-badge pending"
            >
			<svg viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="8.5" />
              <path d="M12 7v5l3 2" /></svg
            >Belum Mengisi</span
          >
		  <time>&mdash;</time>
        </div>
      </section>

      <div class="privacy-note">
        <span class="note-icon"
          >
		  <svg viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="9" />
            <path d="M12 11v6M12 7.5v.5" /></svg></span
        >Status hanya menunjukkan partisipasi. Identitas pengirim feedback tidak
        ditampilkan.
      </div>
    </main>
  </body>
</html>
