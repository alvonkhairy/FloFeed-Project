<?php
session_start();
require_once __DIR__ . '/koneksi.php';

if (isset($_SESSION['user_id'])) {
    header('Location: home.php');
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $passwordConfirmation = $_POST['password-confirmation'] ?? '';

    if ($username === '' || $email === '' || $password === '' || $passwordConfirmation === '') {
        $error = 'Semua field wajib diisi.';
    } elseif (strlen($password) < 8) {
        $error = 'Password minimal 8 karakter.';
    } elseif ($password !== $passwordConfirmation) {
        $error = 'Konfirmasi password tidak cocok.';
    } else {
        $checkStmt = mysqli_prepare($conn, 'SELECT user_id FROM users WHERE email = ? OR name = ? LIMIT 1');
        mysqli_stmt_bind_param($checkStmt, 'ss', $email, $username);
        mysqli_stmt_execute($checkStmt);
        $existingUser = mysqli_stmt_get_result($checkStmt);

        if (mysqli_num_rows($existingUser) > 0) {
            $error = 'Email atau username sudah terdaftar.';
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insertStmt = mysqli_prepare($conn, 'INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
            mysqli_stmt_bind_param($insertStmt, 'sss', $username, $email, $hashedPassword);

            if (mysqli_stmt_execute($insertStmt)) {
                $success = 'Pendaftaran berhasil. Silakan masuk.';
                $_SESSION['flash_message'] = $success;
                header('Location: login.php');
                exit;
            }

            $error = 'Pendaftaran gagal. Silakan coba lagi.';
        }
    }
}
?>
<!doctype html>
<html lang="id">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>FloFeed - Daftar</title>
		<link rel="stylesheet" href="assets/css/style.css" />
	</head>
	<body>
		<main class="page login-page">
			<section class="card">
				<h1 class="form-title">Buat akun FloFeed</h1>
				<p class="form-sub">
					Daftar untuk bergabung, membuat room, dan menyampaikan pendapat.
				</p>

				<?php if ($error !== ''): ?>
					<p style="color: #b42318; background: #fef3f2; border: 1px solid #fecdca; padding: 10px 12px; border-radius: 8px; margin-bottom: 16px;">
						<?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
					</p>
				<?php endif; ?>

				<form action="daftar.php" method="post" aria-label="Form pendaftaran">
					<div class="input-row">
						<label class="field-label" for="username">Username</label>
						<input
							id="username"
							name="username"
							class="text-input"
							type="text"
							placeholder="Pilih username"
							autocomplete="username"
							required
						/>
					</div>

					<div class="input-row">
						<label class="field-label" for="email">Email</label>
						<input
							id="email"
							name="email"
							class="text-input"
							type="email"
							placeholder="you@domain.com"
							autocomplete="email"
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
							placeholder="Minimal 8 karakter"
							autocomplete="new-password"
							minlength="8"
							required
						/>
					</div>

					<div class="input-row">
						<label class="field-label" for="password-confirmation">Konfirmasi Kata Sandi</label>
						<input
							id="password-confirmation"
							name="password-confirmation"
							class="text-input"
							type="password"
							placeholder="Ulangi kata sandi"
							autocomplete="new-password"
							minlength="8"
							required
						/>
					</div>

					<div class="meta">
						<label>
							<input type="checkbox" name="terms" required />
							<span>Saya menyetujui syarat dan ketentuan</span>
						</label>
					</div>

					<div class="actions">
						<button type="submit" class="btn btn-primary">Daftar</button>
					</div>
				</form>

				<p class="footer-note">
					Sudah punya akun?
					<a href="login.php">Masuk</a>
				</p>
			</section>
		</main>
	</body>
</html>
