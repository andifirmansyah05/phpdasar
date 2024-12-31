<?php

$mahasiswa = [
    [
        "nama" => "Andi Firmansyah",
        "nrp" => "123456",
        "email" => "KZBvH@example.com",
        "jurusan" => "Fisika",
        "gambar" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRj5p4T8mFBv46uKm-A6DBM5Zac0n_8Z091dw&s",
    ],
    [
        "nama" => "Clock Humidity",
        "nrp" => "809434",
        "email" => "Humidity@example.com",
        "jurusan" => "Biologi",
        "gambar" => "https://imgcdn.stablediffusionweb.com/2024/9/19/ea36129a-658f-4f96-9ef9-9065534afddf.jpg",
    ],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach ($mahasiswa as $mhs): ?>
        <ul>
            <li><img width="100px" src="<?= $mhs["gambar"]; ?>"></li>
            <li>Nama : <?= $mhs["nama"]; ?></li>
            <li>NRP : <?= $mhs["nrp"]; ?></li>
            <li>Email : <?= $mhs["email"]; ?></li>
            <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
        </ul>
    <?php endforeach; ?>

</body>

</html>