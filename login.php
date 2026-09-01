<?php
session_start();
require_once __DIR__ . '/koneksi.php';

if (isset($_SESSION['user_id'])) {
    header('Location: home.php');
    exit;
}

$error = '';
$success = $_SESSION['flash_message'] ?? '';
unset($_SESSION['flash_message']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($login === '' || $password === '') {
        $error = 'Email/username dan password wajib diisi.';
    } else {
        $stmt = mysqli_prepare($conn, 'SELECT user_id, name, email, password FROM users WHERE email = ? OR name = ? LIMIT 1');
        mysqli_stmt_bind_param($stmt, 'ss', $login, $login);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = (int) $user['user_id'];
            $_SESSION['username'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            header('Location: home.php');
            exit;
        }

        $error = 'Email/username atau password salah.';
    }
}
?>
<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>FloFeed — Login</title>
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <main class="page login-page">
      <section class="card">
        <h1 class="form-title">Masuk ke FloFeed</h1>
        <p class="form-sub">
          Masukkan akun Anda untuk mengakses room dan membuat pertanyaan.
        </p>

        <?php if ($success !== ''): ?>
          <p style="color: #067647; background: #ecfdf5; border: 1px solid #a7f3d0; padding: 10px 12px; border-radius: 8px; margin-bottom: 16px;">
            <?php echo htmlspecialchars($success, ENT_QUOTES, 'UTF-8'); ?>
          </p>
        <?php endif; ?>

        <?php if ($error !== ''): ?>
          <p style="color: #b42318; background: #fef3f2; border: 1px solid #fecdca; padding: 10px 12px; border-radius: 8px; margin-bottom: 16px;">
            <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
          </p>
        <?php endif; ?>

        <form action="login.php" method="post" aria-label="Login form">
          <div class="input-row">
            <label class="field-label" for="email">Email atau Username</label>
            <input
              id="email"
              name="email"
              class="text-input"
              type="text"
              placeholder="you@domain.com"
              autocomplete="username"
              required
            />
          </div>

          <div class="input-row">
            <label class="field-label" for="password">Kata Sandi</label>
            <input
              id="password"
              name="password"
              class="text-input"
              type="password"
              placeholder="Masukkan password"
              autocomplete="current-password"
              required
            />
          </div>

          <div class="meta">
            <label>
              <input type="checkbox" name="remember" />
              <span>Ingat saya</span>
            </label>
          </div>

          <div class="actions">
            <button type="submit" class="btn btn-primary">Masuk</button>
          </div>
        </form>

        <p class="footer-note">
          Belum punya akun?
          <a href="register.php">Daftar</a>
        </p>
      </section>
    </main>
  </body>
</html>
