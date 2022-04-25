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
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

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

<?php 

    function hapus($id){
        global $db;
        mysqli_query($db, "DELETE FROM mahasiswa WHERE id = $id");
    }

    function ubah($data){
        global $db;
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $nim = htmlspecialchars($data["nim"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
    
            // query insert data
            mysqli_query($db, "UPDATE mahasiswa SET
                                nim = '$nim',
                                nama = '$nama',
                                jurusan = '$jurusan'
                                WHERE id = $id");
        return mysqli_affected_rows($db);
    }

?>
