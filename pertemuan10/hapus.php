<?php
require "functions.php";

$id = $_GET["id"];
// cek apakah data berhasil di tambahkan atau tidak
if (hapus($id) > 0) {
    echo "
            <script>
                alert('data berhasil dihapus!');
                document.location.href = 'index.php';
            </script>
        ";
} else {
    echo "
            <script>
                alert('data gagal dihapus!');
                document.location.href = 'index.php';
            </script>
        ";
}

?>