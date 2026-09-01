<?php
function renderNavbar(string $basePath = '.') : void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $username = $_SESSION['username'] ?? 'Upik Nambo';
    $email = $_SESSION['email'] ?? 'upik@email.com';
    $initials = strtoupper(substr($username, 0, 2));
    $homeHref = rtrim($basePath, '/') . '/home.php';
    $logoutHref = rtrim($basePath, '/') . '/logout.php';
    ?>
    <header class="topbar">
        <a class="brand" href="<?= htmlspecialchars($homeHref, ENT_QUOTES, 'UTF-8'); ?>" aria-label="FloFeed home">
            <span class="brand-name">FloFeed</span>
        </a>

        <details class="account">
            <summary class="account-trigger">
                <span class="avatar"><?= htmlspecialchars($initials, ENT_QUOTES, 'UTF-8'); ?></span>
                <span class="account-name"><?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?></span>
                <span class="chevron" aria-hidden="true">&#9662;</span>
            </summary>
            <div class="account-panel">
                <div class="account-info">
                    <p class="name"><?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?></p>
                    <p class="email"><?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <div class="account-divider"></div>
                <a class="logout-btn" href="<?= htmlspecialchars($logoutHref, ENT_QUOTES, 'UTF-8'); ?>">Logout</a>
            </div>
        </details>
    </header>
    <?php
}
