<!-- function
1. built-in function
2. user-defined function -->

<!-- function yang berhubungan dg string
1. strlen() [untuk menghitung panjang string]
2. strcmp() [untuk membandingkan string]
3. explode() [untuk memecah string]
4. htmlspecialchars() [untuk mencegah sql injection] -->

<!-- Utility
1. var_dump() [untuk melihat isi dari variabel]
2. isset() [untuk mengecek apakah variabel sudah ada atau belum]
3. empty() [untuk mengecek apakah variabel kosong atau tidak]
4. die() [untuk memberhentikan script]
5. sleep() [untuk memberhentikan script selama x detik] -->


<?php
echo date("l, d M Y");
echo "<br>";


// Time (detik yg sudah berlalu dari 1 january 1970)
echo time();
echo "<br>";

echo date("l", time() + 60 * 60 * 24);

echo "<br>";

// mktime (buat waktu sendiri dari 1 january 1970 sampai waktu yg ditentukan)
// mktime(jam, menit, detik, bulan, tanggal, tahun)
echo date("l", mktime(0, 0, 0, 8, 28, 2002));
echo "<br>";

// strtotime (sama seperti mktime tapi pakek string)
echo date("l", strtotime("28 aug 2002"));
echo "<br>";

$x = 0;
if (empty($x)) {
    echo "kosong";
} else {
    echo "ada";
}


?>