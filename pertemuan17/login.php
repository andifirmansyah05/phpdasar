<?php
session_start();
require "functions.php";

if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {

    // ambil data cookie
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    // query data username berdasarkan id
    $data = query("SELECT username FROM user WHERE id = '$id'")[0];
    // var_dump($data);

    // cek cookie dan username dgn database sama atau tidak
    if ($username === hash('sha256', $data["username"])) {
        $_SESSION["login"] = true;
    }
}


// isset ini digunakan untuk mengecek apakah tombol login sudah ditekan atau belum
// isset untuk mengetahui apakah post sudah ada atau belum
if (isset($_POST["login"])) {

    // mengambil data username dan password yang diketik oleh user
    $username = $_POST["username"];
    $password = $_POST["password"];

    // melakukan query ke database dengan data berdasarkan username saja
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // melakukan cek apakah username ada atau tidak
    if (mysqli_num_rows($result) === 1) { 
        $row = mysqli_fetch_assoc($result); // dilakukan fetch agar mendapatkan data didalam resultnya, karena hasil dari result adalah object maka perlu di fetch dulu
        if (password_verify($password, $row["password"])) { // password_verify ini untuk membandingkan password yang diinputkan dengan password yang ada didalam database
            $_SESSION["login"] = true;

            if (isset($_POST["remember"])) {
                // membuat cookie
                setcookie("id", $row["id"], time() + 60);
                setcookie("key", hash('sha256', $row["username"], time() + 60));
            }

            header("Location: index.php"); // jika password cocok maka akan diarahkan ke halaman index.php
            exit; // untuk menghentikan proses selanjutnya
        }
    }

    $error = true; // jika password tidak cocok maka error akan true untuk menampilkan pesan error 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="w-100  d-flex flex-column  align-items-center">
        <div class="w-25 mt-5 p-3 rounded shadow">
            <h2 class="mb-4">Login</h2>
            <?php if (isset($error)): ?>
                <p style="color: red; font-style: italic;">Username / Password Salah!</p>
            <?php endif; ?>
            <form action="" method="post">
                <div class="mb-2">
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" type="text" name="username" id="username">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember Me</label>
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary w-100" type="submit" name="login">Registrasi</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>