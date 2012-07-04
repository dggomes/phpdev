<?php
/* time.php
   This script prints the current date
   and time in the web browser
*/

$name = "Daniel";
$surname = "Gomes";
echo "Hello, ";
echo $name . " ";
echo $surname;

echo "<br/>";

echo "Today is ";
echo date('j F Y'); // Day name, month name, year
echo " and the time now is ";
echo date('H:i:s'); // Hours, minutes, seconds

echo "<br/>";

$a = date(Y);
$b = 1987;
$sum = $a - $b;
echo "You are " . $sum . " years old.";

echo "<br/>";


?>
