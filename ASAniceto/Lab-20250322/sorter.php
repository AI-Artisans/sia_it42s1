<?php
$numbers = [];

echo "Please enter 10 different numbers:\n";

for ($i = 0; $i <10; $i++){
    echo "Enter number " . ($i + 1) . ": ";
    $input = trim(fgets(STDIN)); 
    if (is_numeric($input)) {
        $numbers[] = (float)$input;
    } else {
        echo "Invalid input. PLease enter a number. \n";
        $i--;
    }
}

sort($numbers);

echo "\nSorted oreder of the entered numbers:\n";

foreach ($numbers as $number) {
    echo $number . " ";
}
echo "\n";
?>