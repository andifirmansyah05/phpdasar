<?php
// Set timezone untuk memastikan waktu benar
date_default_timezone_set("Asia/Jakarta");
function salam($nama = "Tamu")
{
    $jam = date("G"); // Ambil jam dalam format 24 jam
    $waktu = "";
    // Cek waktu pagi siang dan malam
    if ($jam >= 5 && $jam < 12) {
        $waktu = "Pagi";
    } elseif ($jam >= 12 && $jam < 17) {
        $waktu = "Siang";
    } else {
        $waktu = "Malam";
    }

    return "Selamat $waktu, Mas $nama!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Function</title>
</head>

<body>
    <h1><?= salam(); ?></h1>
</body>

</html>