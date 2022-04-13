<?php 
$mahasiswa = [
    [
        "nim" => "105220045",
        "nama" => "Aidityas Adhakim",
        "email" => "aidityasadhakim250@gmail.com",
        "jurusan" => "Ilmu Komputer"
    ],
    [
        "nama"=>"Pratama Bima",
        "nim"=>"105220046",
        "email" =>"bimbong24@gmail.com",
        "jurusan" => "Ilmu Perikanan"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>
<body> 
    <ul>
    <h1>Daftar Mahasiswa</h1>
        <?php 
            foreach( $mahasiswa as $mhs) :
        ?>
               <li>
                   <a href="detailmhs.php?nama=<?= $mhs["nama"];?>&nim=<?= $mhs["nim"]?>&jurusan=<?= $mhs["jurusan"]?>"><?php echo $mhs["nama"]; ?></a>
                </li>
        <?php 
            endforeach;
        ?>
    </ul>
    
</body>
</html>
