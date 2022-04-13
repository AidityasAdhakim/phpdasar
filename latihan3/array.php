<?php 

// $mobil = array("BMW","Volvo","Mazda");

// for($i=0;$i<3;$i++){
//     echo $mobil[$i];
//     echo "<br>";
// }

// echo count($mobil);

// Associative Array

// $mobil = array("Mahal"=>"BMW", "Murah" => "Brio", "Sedang"=>"Avanza");
// echo $mobil["Mahal"];
// echo $mobil["Murah"];
// echo $mobil["Sedang"];

// Loop through Associative Array
// foreach($mobil as $i => $i_value){
//     echo $i_value;
//     echo "<br>";
// }

$mobil = array(
    array("Avanza","Mobil Sedang","Banyak Dipakai"),
    array("Brio","Murah","Banyak Dipakai")
);

for($i=0;$i<count($mobil);$i++){
    echo "<ul>";
    for($j=0;$j<3;$j++){
        echo "<li>Penjelasan Mobi :<br> " . $mobil[$i][$j] . "</li>";
    }
    echo "</ul>";
}

 ?>
