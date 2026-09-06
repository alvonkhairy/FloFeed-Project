<?php
session_start(); // jalankan session //

$_SESSION = [];
session_destroy(); // hapus session //

header('Location: login.php'); 
exit;
