<?php 
// koneksi ke database
$db = mysqli_connect("localhost", "root", "", "phpdasar");

// mengambil data dari tabel mahasiswa / query data

$result = mysqli_query($db,"SELECT * FROM mahasiswa");

// ambil data objek dari result


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <table border="3" cellpadding="10" cellspacing="0" >
       
    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jurusan</th>
    </tr>

    <tr>
        <td>1</td>
        <td>
            <a href="">Ubah</a> |
            <a href="">Hapus</a>
        </td>
        <td>105220045</td>
        <td>Aidityas Adhakim</td>
        <td>Ilmu Komputer</td>

    </tr>

    </table>
</body>
</html>