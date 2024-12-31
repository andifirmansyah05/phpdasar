<?php
// Pertemuan 2 - php dasar
// sintaks php

// standar output
// echo, print, 
// print_r (untuk array), var_dump (untuk melihat isi dari variabel) (untuk debugging)

// echo "Andi Firmansyah ";
// print "Andi Firmansyah ";
// print_r("Andi Firmansyah ");
// var_dump("Andi Firmansyah");
// echo true;
// echo " ";
// echo false;
// echo " ";
// echo 123123;
// echo " Jum'at ";
// yang sering digunakan echo



// Penulisan sintaks php
// 1. PHP di dalam HTML
// 2. HTML di dalam PHP

// Variable dan tipe data
// Variabel
// tidak boleh diawali dengan angka, tapi boleh mengandung angka
// $nama = "Andi Firmansyah";

// echo "Halo, selamat datang $nama";
// echo "<br>";
// echo 'Halo, selamat datang $nama';


// Operator
// Aritmatika
// + - * / %

echo 1 + 1;
echo "<br>";
echo 1 - 1;
echo "<br>";
echo 1 - 2;
echo "<br>";
echo 2 * 9;
echo "<br>";
echo 9 / 2;
echo "<br>";
echo 2 % 2;

echo "<br>";
$x = 10;
$y = 2;
echo "ini perhitungan $x + $y = " . $x + $y;

echo "<br>";

// penghubung string / concatenation
// .
$nama_depan = "Andi";
$nama_belakang = "Firmansyah";
echo $nama_depan . " " . $nama_belakang;


echo "<br>";

// operator penugasan
// = += -= *= /= %= .=
$a = 1;
$a += 5;
echo $a;
echo "<br>";

$name = "Andi";
$name .= " Firmansyah";
echo $name;

echo "<br>";

// operator perbandingan
// < > <= >= == !=
var_dump(1 == "1"); // true karena tidak mengecek type datanya
echo "<br>";
var_dump(1 > 2);
echo "<br>";
var_dump(1 < 2);
echo "<br>";
var_dump(1 <= 2);
echo "<br>";
var_dump(1 >= 2);
echo "<br>";
var_dump(1 == 2);
echo "<br>";
var_dump(1 != 2);
echo "<br>";

echo "<hr>";
// identitas
// === !==
var_dump(1 === "1");
echo "<br>";
var_dump(1 !== "1");
echo "<br>";

echo "<hr>";

// Logika
echo "Logika";
echo "<br>";
// && || !
$x = 10;
echo "Logika and (&&) akan bernilai true jika keduanya bernilai true";
echo "<br>";
var_dump($x < 20 && $x % 2 == 0);   // harus keduanya true hasilnya true
echo "<br>";
var_dump($x < 20 || $x % 2 == 1); // salah satu bener akan true hasilnya
echo "<br>";

// Tamat

?>