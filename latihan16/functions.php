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
    
    // upload gambar
    $gambar = upload();
    if( !$gambar ) {
        return false;
    }

    // query insert data
    mysqli_query($db, "INSERT INTO mahasiswa VALUES ('','$nama','$nim','$jurusan','$gambar')");
    return mysqli_affected_rows($db);
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $fileSize = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if($error === 4){
        echo "<script>
                alert('Masukkan Gambar!!')
                </script";
        return false;
    }

    // cek apakah yang diupload gambar
    $ekstensiGambar = ['jpg','jpeg','png'];
    $ekstensiFile = explode('.',$namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));

    if( !in_array($ekstensiFile, $ekstensiGambar) ){
        echo "<script>
                alert('Anda tidak memasukkan gambar')
                </script";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if( $fileSize > 5000000 ){
        echo "<script>
                alert('Size gambar terlalu besar!')
                </script";
    }

    $namaFileBaru = uniqid();
    $namaFileBaru.='.';
    $namaFileBaru .= $ekstensiFile;
    // upload file
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
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
        $gambarLama = $data["gambar"];

        if($_FILES["gambar"]["error"] === 4){
            $gambar = $gambarLama;
        } else {
            $gambar = upload();
        }
    
        // query insert data
        mysqli_query($db, "UPDATE mahasiswa SET
                            nim = '$nim',
                            nama = '$nama',
                            jurusan = '$jurusan',
                            gambar = '$gambar'
                            WHERE id = $id");
        return mysqli_affected_rows($db);
    }

    function cari($keyword){
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%'";
        return query($query); 
    }
function registrasi($data){
    global $db;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db,$data["password"]);
    $password2 = mysqli_real_escape_string($db,$data["password2"]);

    // cek username
    $result = mysqli_query($db,"SELECT * FROM users WHERE username = '$username'");

    if( mysqli_fetch_assoc($result) ){
        echo "<script>
            alert('username sudah dibuat')
        </script>";
        return false;
    }

    if( $password !== $password2 ){
        echo "<script> 
            alert('konfirmasi password tidak sesuai')
        </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //  tambahkan userbaru ke database
    mysqli_query($db, "INSERT INTO users VALUE ('','$username','$password')");

    return mysqli_affected_rows($db);
}
?>
