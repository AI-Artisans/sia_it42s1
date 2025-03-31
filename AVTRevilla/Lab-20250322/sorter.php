<?php

// Array to store the numbers
$numbers = [];

// Prompt the user to enter 10 numbers
echo "Please enter 10 different numbers:\n";

// Read 10 numbers from the console
for ($i = 0; $i < 10; $i++) {
    echo "Enter number " . ($i + 1) . ": ";
    $input = trim(fgets(STDIN)); // Read input from the console

    if (is_numeric($input)) {
        $numbers[] = (float)$input; // Add the number to the array
    } else {
        echo "Invalid input. Please enter a number.\n";
        $i--; // Decrement counter to re-enter the current number
    }
}

// Sort the array in ascending order
sort($numbers);

// Output the sorted numbers
echo "\nSorted order of the entered numbers:\n";

foreach ($numbers as $number) {
    echo $number . " ";
}

echo "\n";
?>
