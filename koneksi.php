<?php
function koneksi()
{
    static $conn = null;

    if ($conn === null) {
        $host = getenv('DB_HOST') ?: 'localhost';
        $username = getenv('DB_USER') ?: 'root';
        $password = getenv('DB_PASS') ?: '';
        $database = getenv('DB_NAME') ?: 'flofeed';

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $conn = mysqli_connect($host, $username, $password, $database);

        if (!$conn) {
            throw new RuntimeException('Koneksi database gagal: ' . mysqli_connect_error());
        }

        mysqli_set_charset($conn, 'utf8mb4');
    }

    return $conn;
}

$conn = koneksi();
?>
