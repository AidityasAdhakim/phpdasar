<?php
require 'functions.php';

// Mengambil data di URL
$id = $_GET["id"];

// Query data mengambil data mahasiswa
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


// koneksi ke DBMS
$db = mysqli_connect("localhost","root","","phpdasar");

if(isset($_POST["submit"])){
//    cek apakah data berhasil diubah
    if( ubah($_POST) > 0){
        echo "
            <script>
                alert('Data Berhasil Diubah!')
                document.location.href = 'index.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('Data Gagal Diubah')
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah</title>
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $mhs['id']; ?>">
        <ul>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
            </li>

            <li>
                <label for="nim">NIM : </label>
                <input type="text" name="nim" id="nim" required
                value="<?= $mhs["nim"]; ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" required
                value="<?= $mhs["jurusan"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>

    </form>
</body>
</html>