<?php
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query)
{
    global $conn; // mengambil variabel global conn
    $result = mysqli_query($conn, $query); // query data dari database
    $rows = []; // membuat array yang menampung data
    while ($row = mysqli_fetch_assoc($result)) { // fetch result, while karena fetch menghasilkan data yang banyak, maka perlu dilakukan perulangan
        $rows[] = $row;
    }
    return $rows; // mengembalikan data
}

function tambah($data)
{
    global $conn; // mengambil variabel global conn

    // mendifinisikan variabel yang akan ditambahkan ke database
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // upload gambar dulu
    $gambar = upload(); // masuk ke function upload
    if (!$gambar) { // jika gambar false maka mengembalikan false
        return false;
    }

    // menambahkan data ke database
    $query = "INSERT INTO mahasiswa VALUES ('', '$nrp', '$nama', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query); // query data ke database

    return mysqli_affected_rows($conn); // mengembalikan data, jika berhasil akan mengembalikan nilai 1, jika gagal akan mengembalikan nilai 0
}

function upload()
{
    // mengambil data file gambar
    $namaFile = $_FILES["gambar"]["name"]; // nama file
    $ukuranFile = $_FILES["gambar"]["size"]; // ukuran file
    $error = $_FILES["gambar"]["error"]; // 0 jika tidak ada error, 4 jika tidak ada gambar
    $tmpName = $_FILES["gambar"]["tmp_name"]; // tempat penyimpanan sementara


    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu');
            </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ["jpg", "jpeg", "png"]; // ekstensi yang diizinkan
    $ekstensiGambar = explode(".", $namaFile); // menghasilkan ini ["namafile", "ekstensi"] , explode akan memisahkan kata dengan tanda titik sebagai pemisah
    $ekstensiGambar = strtolower(end($ekstensiGambar)); // diambil ekstensinya saja
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) { // cara membaca function in_array yaitu jika $ekstensiGambar ada di dalam $ekstensiGambarValid maka menghasilkan nilai true, bila diberi tanda seru diatas makan bila hasil in_array false akan menjalakan perintah pengkondisian
        echo "<script>
                alert('yang anda upload bukan gambar');
            </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar 1.000.000 itu 1MB
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar, harus dibawah 1MB');
            </script>";
        return false;
    }

    // generate nama gambar baru , mencegah nama yang diupload sama
    $namaFileBaru = uniqid(); // mengenerate id unik, yang akan digunakan sebagai nama gambar
    $namaFileBaru .= '.'; // tambahkan titik
    $namaFileBaru .= $ekstensiGambar; // tambahkan ekstensi
    // sehingga namaFileBaru akan berisikan idunik.jpg (misal)

    // upload data ke folder gambar
    move_uploaded_file($tmpName, "img/$namaFileBaru"); // move_uploaded_file digunakan untuk memindahkan file yang diupload ke folder gambar

    return $namaFileBaru;
}

function hapus($id)
{
    global $conn; // mengambil variabel global conn
    // query untuk menghapus data
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");


    return mysqli_affected_rows($conn); // mengembalikan data jika berhasil akan mengembalikan nilai 1, jika gagal akan mengembalikan nilai 0
}

function ubah($data)
{
    global $conn;
    $id = $data["id"];
    // htmlspecialchars digunakan untuk menghindari serangan xss seperti memasukan html di inputnya
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE mahasiswa SET nrp = '$nrp', nama = '$nama', email = '$email', jurusan = '$jurusan', gambar = '$gambar' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    if (empty(trim($keyword))) {
        $query = "SELECT * FROM mahasiswa LIMIT 0, 5";
        return query($query);
    } else {
        $query = "SELECT * FROM mahasiswa WHERE 
                nama LIKE '%$keyword%' OR
                nrp LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'
            ";
        return query($query);
    }
}

function registrasi($data)
{
    global $conn;
    //      strtolower ini agar data yang diinputkan berupa huruf kecil
    //      stripslashes ini untuk menghilangkan backslash
    $username = strtolower(stripslashes($data["username"]));
    // mysqli_real_escape_string untuk menghindari sql injection simbol diperbolehkan
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    // mysqli_query ini mengambil data dari database tapi menghasilkan object
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    // var_dump($result); // menghasilkan object sehigga perlu di fetch dulu
    // var_dump(mysqli_fetch_assoc($result)); // fetch ini akan menghasilkan data yang diinginkan seperti ini querynya
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar!');
            </script>";
        return false;
    }

    //cek konfirmasi password harus sama dengan password
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
            </script>";
        return false;
    }
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambah user baru ke database
    $query = "INSERT INTO user VALUES('', '$username', '$password')";
    $result = mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

