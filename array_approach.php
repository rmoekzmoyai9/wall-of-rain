<?php

echo "Let's measure some rain!\n";

// Read input from file auto-wall.txt
$input = json_decode(file_get_contents('auto_wall.txt'));
If (!$input) {
	exit ("No file found. Please use wallmaker.php to generate a wall!");
}  

// Generate 2D array
// 1st dimension is place on wall
// 2nd dimension is height
// overall dimensions are based on length of input and highest height
$wall = array();
$maxHeight = 0;
$maxLength = count($input);
for ($i = 0; $i < $maxLength; $i++) {
	if ($maxHeight < $input[$i]) {
		$maxHeight = $input[$i];
	}
	for ($j = 0; $j <$input[$i]; $j++) {
		$wall[$i][$j] = "This is a wall!";
	}
}

// Time to check for places water can puddle in!
// Iterate over each location on our wall
// If the spot is a wall, move on
// If it isn't a wall, check for walls to the left and right
// If the check passes, tally up the water!
for ($i = 0; $i < $maxLength; $i++) {
	for ($j = 0; $j < $maxHeight; $j++) {
		if (!isset($wall[$i][$j])) {
			puddleChecker($wall, $i, $j);
		}
	}
}

function puddleChecker($theWall, $x, $y) {
	//
}
