<?php 
require '../functions.php';
$keyword = $_GET["keyword"];
$mahasiswa = query("SELECT * FROM mahasiswa WHERE 
nama like '%$keyword%' OR
nim like '%$keyword%' OR
jurusan like '%$keyword%'
");


?>
<table border="3" cellpadding="10" cellspacing="0" >
       
       <tr>
           <th>No.</th>
           <th>Aksi</th>
           <th>NIM</th>
           <th>Nama</th>
           <th>Jurusan</th>
       </tr>
       <?php $i=1; ?>
       
       <?php foreach ($mahasiswa as $row) : ?>
           
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
