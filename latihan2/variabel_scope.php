<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 3</title>
</head>
<body>
<?php
    $x=5;
    $counter=2;

    function myFunction(){
        // $x = 10;
        // global $x;
        // $GLOBALS['x'] = $GLOBALS['x'] * $GLOBALS['counter'];
        // echo "<p>This is variabel x inside : </p>";

        static $x = 5;
        echo "Local x is : $x";
        $x++;
    }
    myFunction();
    echo "<br>";
    myFunction();
    echo "<br>";
    myFunction();
    echo "<br>";
    echo "This is Variabel x outside myFunction : $x";

 ?>
</body>
</html>

