<?php

namespace HumanSimulator;

class MaleHuman extends HumanAbstract {

	public function goToGym() {
		/** Ideal BMI -> Height (cm) - Weight (kg) = 100 */
		if (($this->sgetHeight() - $this->getWeight()) < 100) {
			$this->exercise();
		}
	}

	public function eat() {
		$this->addWeight(0.2);
	}
}
