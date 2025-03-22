<?php
echo "Enter 10 numbers separated by spaces: ";
$input = trim(fgets(STDIN));
$numbers = explode(" ", $input);
$numbers = array_map('intval', $numbers);
sort($numbers);
echo "Sorted numbers: " . implode(" ", $numbers) . "\n";
?>
