<?php
session_start();

// ketiga dibawah ini untuk menghapus session/menghentikan session
$_SESSION = [];
session_unset();
session_destroy();

// setelah session dihapus maka akan diarahkan ke halaman login
header("Location: login.php");

?>