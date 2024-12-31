<!-- Pengulangan
1. for
2. while
3. do while
4. foreach (untuk array) -->


<?php
// pengulangan
// for
echo "Pakek for <br>";
for ($i = 0; $i < 5; $i++) {
    echo "Hello World? <br>";
}
echo "<hr>";

// while (dicek kondisi baru dijalankan)
echo "Pakek while <br>";
$x = 0;
while ($x < 5) {
    echo "Hello World! <br>";
    $x++;
}

echo "<hr>";

// do while
// akan dijalankan dulu baru di cek kondisinya (kebalikan while)
echo "Pakek do while <br>";
$y = 10; // ganti 10 misal, maka akan dijalankan sekali dulu (lihat webnya)
do {
    echo "Hello World$$ <br>";
    $y++;
} while ($y < 5);

echo "<hr>";

// foreach