<?php
sleep(1);
require "../functions.php";

// menangkap data keyword yang dikirim dari index.php dengan GET
$keyword = $_GET["keyword"];

// query data mahasiswa berdasarkan keyword
$mahasiswa = query("SELECT * FROM mahasiswa WHERE 
        nama LIKE '%$keyword%' OR
        nrp LIKE '%$keyword%' OR
        email LIKE '%$keyword%' OR
        jurusan LIKE '%$keyword%'
    ");
// var_dump($mahasiswa);

// Periksa apakah hasil pencarian kosong
$statusPencarian = count($mahasiswa) === 0;

?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Id</th>
            <th scope="col">Action</th>
            <th scope="col">Gambar</th>
            <th scope="col">NRP</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Jurusan</th>
        </tr>
    </thead>
    <tbody>
        <!-- status pencarian untuk bila data tidak ada, akan ditampilkan "Data Tidak Ada" -->
        <?php if ($statusPencarian): ?>
            <tr>
                <td colspan="8" class="text-center">Data Tidak Ada</td>
            </tr>
        <?php else: ?>
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $mhs): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $mhs["id"] ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $mhs["id"]; ?>">Edit</a> | <a href="hapus.php?id=<?= $mhs["id"]; ?>"
                            onclick="return confirm('yakin?');">Hapus</a>
                    </td>
                    <td>
                        <img width="60" src="img/<?= $mhs["gambar"]; ?>" alt="<?= $mhs["nama"]; ?>">
                    </td>
                    <td><?= $mhs["nrp"]; ?></td>
                    <td><?= $mhs["nama"]; ?></td>
                    <td><?= $mhs["email"]; ?></td>
                    <td><?= $mhs["jurusan"]; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<!-- tombol pagination -->