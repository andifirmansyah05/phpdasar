<?php
session_start();

// ketiga dibawah ini untuk menghapus session/menghentikan session
$_SESSION = [];
session_unset();
session_destroy();

// untuk menghapus cookie
setcookie("id", "", time() - 3600);
setcookie("username", "", time() - 3600);

// setelah session dihapus maka akan diarahkan ke halaman login
header("Location: login.php");

?>