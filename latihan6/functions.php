<?php 
$db = mysqli_connect("localhost", "root", "", "phpdasar");
    
    function query($query){
        global $db;
        $result = mysqli_query($db, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ){
            $rows[] = $row;
        }
        return $rows;
    }
?>

<?php

function tambah($data){
    global $db;
    $nama = $data["nama"];
    $nim = $data["nim"];
    $jurusan = $data["jurusan"];

        // query insert data
        mysqli_query($db, "INSERT INTO mahasiswa VALUES ('','$nama','$nim','$jurusan')");
    return mysqli_affected_rows($db);
}


?>

<?php 
function search($data){
    global $db;
    $result = mysqli_query($db, "SELECT * FROM mahasiswa WHERE nim = $data");
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ){
            $rows[] = $row;
        }
        return $rows;
}
?>

