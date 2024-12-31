<?php
$mahasiswa = ["andi firmansyah", "nrp", "prodi", "email"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 3</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <ul>
        <?php foreach ($mahasiswa as $mhs): ?>
            <li><?= $mhs; ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>