<?php

echo "Time to measure some rain, pillar style!\n";

// Read input from file auto-wall.txt
$input = json_decode(file_get_contents('auto_wall.txt'));
if (!$input) {
	exit ("No file found. Please use wallmaker.php to generate a wall!");
}

// Go over each element in the array once
// Ask it the same two questions
// What is the positive difference between your height and
// the height of the highest pillar to your left/right?
// Then take the lower value and add it to the tally

// It's that easy!
$tally = 0;
for($i = 0; $i < count($input); $i++) {
	$pillarWater = min(leftHeight($input, $i), rightHeight($input, $i));
	$tally += $pillarWater;
}

echo "The total amount of rain in the wall is " . $tally . "!\n";

function leftHeight($input, $i) {
	$biggestDifference = 0;
	if ($i == 0) {
		return 0;
	}
	
	for ($j = $i - 1; $j > 0; $j--) {
		if ($input[$i] < $input[$j]) {
			$biggestDifference = $input[$j] - $input[$i];
		}
	}
	
	return $biggestDifference;
}

function rightHeight($input, $i) {
	$biggestDifference = 0;
	if ($i == count($input) - 1) {
		return 0;
	}
	
	for ($j = $i + 1; $j < count($input); $j++) {
		if ($input[$i] < $input[$j]) {
			$biggestDifference = $input[$j] - $input[$i];
		}
	}
	
	return $biggestDifference;
}
