<?php
function renderRoomMasterNavigation(string $basePath = '.', string $activePage = 'index'): void
{
    $items = [
        'index' => [
            'label' => 'Feedback Anonim',
            'href' => rtrim($basePath, '/') . '/room-master/room-anonymous-feedback.php',
            'icon' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 6h14v10H9l-4 3V6Z" /></svg>',
        ],
        'status-peserta' => [
            'label' => 'Status Peserta',
            'href' => rtrim($basePath, '/') . '/room-master/room-participant-status.php',
            'icon' => '<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="8" r="3" /><path d="M3 19c.4-2.8 2.4-4.5 6-4.5s5.6 1.7 6 4.5M16 5.5a3 3 0 0 1 0 5.8M17 15.7c2.3.5 3.6 2 4 4.3" /></svg>',
        ],
        'statistik' => [
            'label' => 'Statistik',
            'href' => rtrim($basePath, '/') . '/room-master/room-statistics.php',
            'icon' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 19V9M12 19V5M19 19v-7" /></svg>',
        ],
        'menunggu-syarat' => [
            'label' => 'Menunggu Syarat',
            'href' => rtrim($basePath, '/') . '/room-master/room-waiting-requirements.php',
            'icon' => '<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8.5" /><path d="M12 7v5l3 2" /></svg>',
        ],
    ];

    echo '<nav class="room-tabs" aria-label="Navigasi room">';

    foreach ($items as $key => $item) {
        $activeClass = $key === $activePage ? ' active' : '';
        echo '<a class="room-tab' . $activeClass . '" href="' . htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8') . '">';
        echo '<span class="tab-icon">' . $item['icon'] . '</span>' . $item['label'];
        echo '</a>';
    }

    echo '</nav>';
}
