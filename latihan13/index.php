<?php 
session_start();

if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

// pagination

$jumlahDataPerHalaman = 2;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil( $jumlahData / $jumlahDataPerHalaman);
if( isset($_GET["halaman"]) ){
    $halamanAktif = $_GET["halaman"];
} else {
    $halamanAktif = 1;
}
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$mhs = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

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
        <input type="text" name="keyword" size="40" placeholder="Masukkan Nama.." autocomplete="off">
        <button type="submit" name="search">Search</button>
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

    <form action="">

        <?php for($i=1;$i<=$jumlahHalaman;$i++): ?>
            <?php if( $i == $halamanAktif ): ?>
            <a  style="color: red;" href="?halaman=<?= $i; ?>"><?= $i; ?>  
            </a>
            
            <?php else : ?>
            <a  href="?halaman=<?= $i; ?>"><?= $i; ?>  
            </a>
            <?php endif; ?>
        <?php endfor; ?>
            
        


    </form>

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
</body>
</html>