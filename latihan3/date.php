<?php 
    // Date
    echo date("l, d-M-Y");

    // echo time();
    echo "<br>";
    // echo date("M", time()+60*60*24*100);

    // mktime()
    // Membuat detik sendiri

    // echo date("l",mktime(0,0,0,2,23,2002));

    // strtotime()
    // Mengubah string ke detik
    echo date("M", strtotime("23 Feb 2002"));
    
?>
