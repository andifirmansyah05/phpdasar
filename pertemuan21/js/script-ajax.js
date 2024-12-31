// mengambil element yang dibutuhkan
const keyword = document.getElementById('keyword');
const tombolCari = document.getElementById('tombol-cari');
const daftarMahasiswa = document.getElementById('daftar-mahasiswa');

// menambahkan event ketika keyword di ketik
keyword.addEventListener('keyup', () => {
    // membuat object ajax
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = () => {
        if(xhr.readyState == 4 && xhr.status == 200) {
            daftarMahasiswa.innerHTML = xhr.responseText;
        }
    }

    // eksekusi ajax
    xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
    xhr.send();


})