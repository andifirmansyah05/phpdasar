<?php
if (empty($_GET)) {
    header("Location: latihan1.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2</title>
</head>
<body>
    <h1>Detail Mahasiswa</h1>
    <ul>
        <li><img width="100" src="<?= $_GET["gambar"]; ?>"></li>
        <li>Nama : <?= $_GET["nama"]; ?></li>
        <li>NRP : <?= $_GET["nrp"]; ?></li>
        <li>Email : <?= $_GET["email"]; ?></li>
        <li>Jurusan : <?= $_GET["jurusan"]; ?></li>
    </ul>

    <a href="latihan1.php">Back to Latihan 1</a>
</body>
</html>