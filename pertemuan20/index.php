<?php
session_start();

// jika session login belum ada maka akan diarahkan ke halaman login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require "functions.php";

// pagination
$jumlahDataPerHalaman = 5;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = $_GET["halaman"] ?? 1;
// var_dump($jumlahHalaman);
$awalData = $jumlahDataPerHalaman * $halamanAktif - $jumlahDataPerHalaman;



// mengambil data mahasiswa
$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

$fiturPaganation = true;
// mencari data mahasiswa
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
    // var_dump(count($mahasiswa));
    (count($mahasiswa) == 5) ? header("Location: index.php?halaman=1") : $fiturPaganation = false;
}

// var_dump($_POST["cari"]);


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

        #loader {
            display: none;
        }
    </style>
</head>

<body>
    <div class="pt-3 container-md">
        <!-- header -->
        <div class="d-flex justify-content-between mb-4">
            <h1 class="fs-2 fw-bold mb-3"><u>Daftar Mahasiswa</u></h1>
            <div class="d-flex align-items-center">
                <a class=" btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>

        <!-- tambah dan search data mahasiswa -->
        <div class="mb-3 d-flex justify-content-between">
            <button class="btn btn-outline-primary">
                <a class="link text-decoration-none" href="tambah.php">Menambahkan data mahasiswa</a>
            </button>

            <div>
                <form action="" method="post" class="d-flex gap-2">
                    <div id="loader" class=" tenor-gif-embed" data-postid="19812323" data-share-method="host"
                        data-aspect-ratio="1" data-width="10%"><a href="https://tenor.com/view/dddd-gif-19812323">Dddd
                            GIF</a>from <a href="https://tenor.com/search/dddd-gifs">Dddd GIFs</a></div>
                    <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
                    <input class="ms-3 form-control" type="text" name="keyword" id="keyword" size="40" placeholder="Masukkan keyword pencarian..."
                        autocomplete="off" class="form-control">
                    <button type="submit" name="cari" id="tombol-cari" class="btn btn-primary px-3">Cari!</button>

                </form>
            </div>


        </div>

        <!-- tabel data mahasiswa -->
        <div id="daftar-mahasiswa">
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
                                <a href="ubah.php?id=<?= $mhs["id"]; ?>">Edit</a> | <a
                                    href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('yakin?');">Hapus</a>
                            </td>
                            <td>
                                <img width="60" src="img/<?= $mhs["gambar"]; ?>" alt="<?= $mhs["nama"]; ?>">
                            </td>
                            <td><?= $mhs["nrp"]; ?></td>
                            <td><?= $mhs["nama"]; ?></td>
                            <td><?= $mhs["email"]; ?></td>
                            <td><?= $mhs["jurusan"]; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- tombol pagination -->
            <?php if ($fiturPaganation): ?>
                <div class="d-flex justify-content-center">
                    <div class="fs-5">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <?php if ($halamanAktif > 1): ?>
                                        <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    <?php endif; ?>
                                </li>
                                <?php for ($i = 1; $i <= $jumlahHalaman; $i++): ?>
                                    <li class="page-item">
                                        <a class="page-link  <?= ($halamanAktif == $i) ? 'bg-primary text-white' : '' ?>"
                                            href="?halaman=<?= $i; ?>">
                                            <?= $i; ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>
                                <li class="page-item">
                                    <?php if ($halamanAktif < $jumlahHalaman): ?>
                                        <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            <?php else: ?>
                <div></div>
            <?php endif ?>
        </div>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>