<?php

echo 'Let\'s make a wall!\n';
$wallArray = '';
for ($i = 0; $i <= 9; $i++) {
	$wallArray = $wallArray . ' ' . rand(1, 10);
}
file_put_contents('auto_wall.txt', $wallArray);
