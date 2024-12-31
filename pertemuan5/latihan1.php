<?php
//array
// variabel yang dapat memiliki banyak nilai atau elemen
// elemen pada array boleh memiliki tipe data yang berbeda
// contoh penulisan
// $nama_variabel = ["element 1", "element 2", "element 3"];


// cara lama
$hari = array("Senin", "Selasa", "Rabu");
// cara baru
$bulan = ["Januari", "Februari", "Maret"];

// menampilkan array
var_dump($hari);
echo "<br>";
print_r($bulan);
echo "<br>";
echo $bulan[1];
echo "<hr>";
// menambahkan elemen baru pada array
var_dump($hari);
$hari[] = "kamis";
$hari[] = "jumat";

echo "<br>";
var_dump($hari);

?>