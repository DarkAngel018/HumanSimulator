<?php

namespace HumanSimulator;

class FemaleHuman extends HumanAbstract {

	public function goToGym() {
		/** Ideal BMI -> Height (cm) - Weight (kg) = 110 */
		if (($this->getHeight() - $this->getWeight()) < 110) {
			$this->exercise();
		}
	}

	public function eat() {
		$this->addWeight(0.1);
	}

}