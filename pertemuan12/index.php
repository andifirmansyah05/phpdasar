<?php
require "functions.php";
$mahasiswa = query("SELECT * FROM mahasiswa");

if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .link:hover {
            color: white;
        }
    </style>
</head>

<body>
    <div class="pt-3 container-md">
        <h1 class="fs-2 fw-bold mb-3"><u>Daftar Mahasiswa</u></h1>
        <!-- <div class="mb-3 d-flex bg-dark w-25 text-center justify-content-center align-items-center p-2 cursor-pointer">
            <a class="text-white text-decoration-none" href="tambah.php">Menambahkan data mahasiswa</a>
        </div> -->
        <div class="mb-3 d-flex justify-content-between">
            <button class="btn btn-outline-primary">
                <a class="link text-decoration-none" href="tambah.php">Menambahkan data mahasiswa</a>
            </button>

            <div>
                <form action="" method="post" class="d-flex gap-2">
                    <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian..."
                        autocomplete="off" class="form-control">
                    <button type="submit" name="cari" class="btn btn-primary px-3">Cari!</button>
                </form>
            </div>

        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Id</th>
                    <th scope="col">Action</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">NRP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jurusan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($mahasiswa as $mhs): ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $mhs["id"] ?></td>
                        <td>
                            <a href="ubah.php?id=<?= $mhs["id"]; ?>">Edit</a> | <a href="hapus.php?id=<?= $mhs["id"]; ?>"
                                onclick="return confirm('yakin?');">Hapus</a>
                        </td>
                        <td>
                            <img width="60" src="<?= $mhs["gambar"]; ?>" alt="<?= $mhs["nama"]; ?>">
                        </td>
                        <td><?= $mhs["nrp"]; ?></td>
                        <td><?= $mhs["nama"]; ?></td>
                        <td><?= $mhs["email"]; ?></td>
                        <td><?= $mhs["jurusan"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>



    </div>
</body>

</html>