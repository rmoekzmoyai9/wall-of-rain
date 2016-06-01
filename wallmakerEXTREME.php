<?php

echo "Let's make a wall!\n";
$wallArray = array();
for ($i = 0; $i <= 9999; $i++) {
	$wallArray[$i] = rand(1, 10000);
}
file_put_contents('auto_wall.txt', json_encode($wallArray));
