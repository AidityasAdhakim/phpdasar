<?php 
session_start();

if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';
$mhs = query("SELECT * FROM mahasiswa");

// Ketika tombol cari ditekan
if( isset($_POST["search"]) ){
    $mhs = cari($_POST["keyword"]);
}
if(isset($_POST['home'])){
    $mhs = query("SELECT * FROM mahasiswa");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Upload</title>
</head>
<body>
    <div class="container">
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah data Mahasiswa</a>
    <br>
    <br>
    <form action="" method="post">
        <button type="submit" name="home">Home</button>
        <br> <br>
    </form>

    <form action="" method="post">
        <label for="search">Cari : </label>
        <input type="text" name="keyword" size="40" placeholder="Masukkan Nama.." autocomplete="off" id="keyword">
        <button type="submit" name="search" id="tombol">Search</button>
        <br>
        <br>
        <?php if(isset($_POST['search'])){
            echo "Hasil Pencarian Keyword " . $_POST["keyword"];
        } ?>
    </form>

    <div class="logout">
        <a href="logout.php">
        <button type="submit" name="logout">Logout</button>
        </a>
    </div>

    <div id="container-table">
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
            <a href="ubah.php?id=<?= $row["id"];?>">Ubah</a> |
            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah yakin ingin menghapus?')">Hapus</a>
        </td>
        <td><?php echo $row["nim"]; ?>
        </td>
        <td><?php echo $row["nama"]; ?>
        </td>
        <td><?php echo $row["jurusan"]; ?>
        </td>
        <td><img src="img/<?= $row["gambar"]; ?>" style="max-width: 100px; height:auto;">
        </td>
    
    </tr>
    <?php endforeach; ?>
    

    </table>
    </div>
</div>

<script src="js/script.js"></script>
</body>
</html>