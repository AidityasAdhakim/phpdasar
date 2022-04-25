<?php 
require 'functions.php';
$mhs = query("SELECT * FROM mahasiswa");
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

    <a href="tambah.php">Tambah data Mahasiswa</a>
    <br>
    <br>

    <table border="3" cellpadding="10" cellspacing="0" >
       
    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jurusan</th>
    </tr>
    <?php $i=1; ?>
    
    <?php foreach ($mhs as $row) : ?>
        
    <tr>
        <td><?php echo $i; $i++; ?>
        </td>
        <td>
            <a href="">Ubah</a> |
            <a href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('Apakah yakin ingin menghapus?')">Hapus</a>
        </td>
        <td><?php echo $row["nim"]; ?>
        </td>
        <td><?php echo $row["nama"]; ?>
        </td>
        <td><?php echo $row["jurusan"]; ?>
        </td>
    
    </tr>
    <?php endforeach; ?>
    

    </table>
</body>
</html>