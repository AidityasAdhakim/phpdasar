<?php 

// Pembelajaran terkait angka php

$x = 50;
$y = "50";
$z = 25.0;

var_dump(is_int($x));
echo "<br>";
var_dump(is_int($y));
echo "<br>";
var_dump(is_float($x));
echo "<br>";
var_dump(is_float($z));

echo "<br>";echo "<br>";
$x = 1.9e411;
var_dump(is_finite($x));
var_dump(is_finite($y));
echo "<br><br>";

$x = 5985;
var_dump(is_numeric($x));

$x = "5985";
var_dump(is_numeric($x));

$x = "59.85" + 100;
$x += $y;
var_dump(is_numeric($x));
echo " $x ";

$x = "Hello";
var_dump(is_numeric($x));

echo "<br><br>";
$x = 20.5;
echo (int)$x;
echo "<br>";

$x = "21.5";
echo (int)$x;
echo "<br>";

?>
