<?php 
    if(!isset($$_GET["nama"]) || !isset($_GET["nim"]) || !isset($_GET["jurusan"])){
        header("Location: getpost.php");
        exit;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detailmhs</title>
</head>
<body>
    <?php echo "Selamat Datang ".$_GET["nama"]; ?>
    <ul>
        <li><?php echo "Nama : ".$_GET["nama"]; ?>
        </li>
        <li><?= "NIM : ".$_GET["nim"]; ?>
        </li>
        <li><?= "Jurusan : ".$_GET["jurusan"]; ?>
        </li>
    </ul>
</body>
</html>