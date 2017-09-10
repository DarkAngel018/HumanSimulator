<?php

use HumanSimulator\MaleHuman;
use HumanSimulator\FemaleHuman;


$male = new MaleHuman(25, 190, 90, false, 5);
$female = new FemaleHuman(20, 168, 55, false, 10);

// Simulate day by day life for 30 years
for ($year = 1; $year < 30; $year++) {
	for ($day = 1; $day < 365; $day++) {
		$male->doOneDay();
		$female->doOneDay();
	}

	$male->addAge();
	$female->addAge();
}