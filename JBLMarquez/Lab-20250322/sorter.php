<?php 
    $numbers =[];

    echo "Please enter 10 different numbers: \n";

    for ($i = 0; $i < 10; $i++){
        echo "Enter Number " . ($i + 1) . ": ";
        $input = trim(fgets(STDIN));
        if (is_numeric($input)){
            $numbers[] = (float)$input;
        } else {
            echo "Invalid input. Please enter a number. \n";
            $i--;
        }
    }

    sort($numbers);

    echo "\n Sorted order of the entered numbers: \n";

    foreach ($numbers as $number){
        echo $number . " ";
    }
    echo "\n";

?>
