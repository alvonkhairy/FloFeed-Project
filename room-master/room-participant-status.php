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

      <?php
      require_once __DIR__ . '/../component/navigation-room-master.php';
      renderRoomMasterNavigation('..', 'status-peserta');
      ?>

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
