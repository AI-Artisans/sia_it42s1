<?php
// Initialize an empty array to store the numbers
$numbers = [];

// Prompt the user to enter 10 numbers
echo "Enter 10 different numbers:\n";

// Loop to accept 10 inputs
for ($i = 0; $i < 10; $i++) {
    echo "Enter number " . ($i + 1) . ": ";
    $input = trim(fgets(STDIN));

    // Validate if the input is a valid number
    if (is_numeric($input)) {
        $numbers[] = (float)$input; // Convert to float for accurate sorting
    } else {
        echo "Invalid input. Please enter a valid number.\n";
        $i--; // Retry the current index
    }
}

// Sort the array in ascending order
sort($numbers);

// Display the sorted numbers
echo "\nSorted numbers:\n";
foreach ($numbers as $num) {
    echo $num . "\n";
}
?>
