<?php
require 'functions.php';
// koneksi ke DBMS
$db = mysqli_connect("localhost","root","","phpdasar");

if(isset($_POST["submit"])){
//    cek apakah data berhasil ditambah
    if( tambah($_POST) > 0){
        echo "
            <script>
                alert('Data Berhasil Ditambahkan!')
                document.location.href = 'index.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('Data Gagal Ditambahkan')
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
    <title>Tambah</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama">
            </li>

            <li>
                <label for="nim">NIM : </label>
                <input type="text" name="nim" id="nim">
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan">
            </li>
            <li>
                <button type="submit" name="submit">Tambahkan Data</button>
            </li>
        </ul>

    </form>
</body>
</html>