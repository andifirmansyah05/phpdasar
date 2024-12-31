<?php 
require "functions.php";

if (isset($_POST["registrasi"])) {
    if (registrasi($_POST) > 0) {
        echo "
            <script>
                alert('user baru berhasil ditambahkan!');
            </script>
        ";
    } else {
        echo "
            <script>
                alert('user baru gagal ditambahkan!');
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="w-100  d-flex flex-column  align-items-center">
        <div class="w-25 mt-5 p-3 rounded shadow">
            <h2 class="mb-4">Registrasi Akun</h2>
            <form action="" method="post">
                <div class="mb-2">
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" type="text" name="username" id="username">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="password2">Konfirmasi Password</label>
                    <input class="form-control" type="password" name="password2" id="password2">
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary w-100" type="submit" name="registrasi">Registrasi</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>