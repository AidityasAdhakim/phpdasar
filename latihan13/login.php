<?php 
require 'functions.php';
session_start();

if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($db, "SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    if($key === hash('sha256',$row['username'])){
        $_SESSION['login'] = true;
    }

}


if(isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}

if( isset($_POST["login"]) ){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $usernameResult = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");

    if(mysqli_num_rows($usernameResult) === 1 ){
        
        // Cek password
        $row = mysqli_fetch_assoc($usernameResult);
        if(password_verify($password, $row["password"])){

            // cek remember me
            if( isset($_POST["remember"])){
                // buat cookie
                setcookie('id', $row['id'], time()+120);
                setcookie('key', hash('sha256',$row['username;']), time()+120);
            }

            $_SESSION["login"] = true;
            header("Location: index.php");
            exit;
        } else {
            echo "<script>
            alert('Password Salah')
        </script>";
        }

    } else {
        echo "<script>
            alert('Username Salah')
        </script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Halaman Login</title>
</head>
<body>
    
    <h1>Halaman Login</h1>

    <form action="" method="POST">

        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            <br>
            <button type="submit" name="login">Login</button>
        </ul>

    </form>

</body>
</html>