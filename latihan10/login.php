<?php 
require 'functions.php';
if( isset($_POST["login"]) ){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $usernameResult = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");

    if(mysqli_num_rows($usernameResult) === 1 ){
        
        // Cek password
        $row = mysqli_fetch_assoc($usernameResult);
        if(password_verify($password, $row["password"])){
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
            <br>
            <button type="submit" name="login">Login</button>
        </ul>

    </form>

</body>
</html>