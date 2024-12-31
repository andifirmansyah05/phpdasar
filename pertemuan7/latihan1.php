<?php
// GET dari url
// POST dari form



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
// SUPER GLOBAL
// variable global milik php
// var_dump($_SERVER["SERVER_PORT"]);


// variabel scope / lingkup variabel
// $x = 10;
// function tampilX()
// {
//     global $x;
//     echo $x;
// }
// tampilX();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach ($mahasiswa as $mhs): ?>
        <ul>
            <li><a
                    href="latihan2.php?nama=<?= $mhs["nama"]; ?>&nrp=<?= $mhs["nrp"]; ?>&email=<?= $mhs["email"]; ?>&jurusan=<?= $mhs["jurusan"]; ?>&gambar=<?= $mhs["gambar"]; ?>"><?= $mhs["nama"]; ?>
                </a>
            </li>
        </ul>
    <?php endforeach; ?>
</body>

</html>