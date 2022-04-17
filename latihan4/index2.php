<?php 
// koneksi ke database
$db = mysqli_connect("localhost", "root", "", "phpdasar");

// mengambil data dari tabel mahasiswa / query data

$result = mysqli_query($db,"SELECT * FROM mahasiswa");

// ambil data (fetch) objek dari result
// mysqli_fetch_row() , mengembalikan array numerik
// mysqli_fetch_assoc() 
// mysqli_fetch_array()
// mysqli_fetch_object()

// while( $mhs = mysqli_fetch_assoc($result) ){
//     var_dump($mhs);
// }


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
    <?php $i=1; ?>
    
    <?php while( $row = mysqli_fetch_assoc($result) ): ?>
        
    <tr>
        <td><?php echo $i; $i++; ?>
        </td>
        <td>
            <a href="">Ubah</a> |
            <a href="">Hapus</a>
        </td>
        <td><?php echo $row["nim"]; ?>
        </td>
        <td><?php echo $row["nama"]; ?>
        </td>
        <td><?php echo $row["jurusan"]; ?>
        </td>
    
    </tr>
    <?php endwhile; ?>
    

    </table>
</body>
</html>