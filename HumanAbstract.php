<?php

namespace HumanSimulator;

/**
 * Human abstract class
 *
 * @author Mladen Milosavljevic
 */
abstract class HumanAbstract {

	const MOOD_HAPPY = 'HAPPY';
	const MOOD_SAD = 'SAD';
	
	private $age;
	private $height;
	private $weight;
	private $hasJob;
	private $friendCount;
	private $mood;

	public function __construct($age, $height, $weight, $hasJob, $friendCount) {
		$this->age = $age;
		$this->height = $height;
		$this->weight = $weight;
		$this->hasJob = (bool) $hasJob;
		$this->friendCount = $friendCount;
		$this->mood = self::MOOD_HAPPY;
	}

	public abstract function goToGym();
	public abstract function eat();

	public function doOneDay() {
		$this->eat();
		$this->goToWork();
		$this->goToGym();
		$this->socialize();
		$this->goToSleep();
	}

	protected function socialize() {
		if ($this->friendCount) {
			$this->hangOut();
		} elseif ($this->findNewfriend()) {
			$this->hangOut();
		} else {
			$this->mood = self::MOOD_SAD;
		}
	}

	protected function goToSleep() {
		sleep(8); /** Simulate sleeping (8 hours) */
	}

	protected function goToWork() {
		if ($this->hasJob) {
			$this->work();
		} elseif ($this->findJob()) {
			$this->hasJob = true;
			$this->work();
		} else {
			$this->mood = self::MOOD_SAD;
		}
	}

	protected function hangOut() {
		$this->mood = self::MOOD_HAPPY;
	}

	protected function work() {
		/** Sleep at work for 4 hours, take a launch brake and then continue sleeping :) */
		sleep(4);
		$this->eat();
		sleep(4);
		$this->hasJob = rand(0, 1) == 1;
	}

	protected function findNewfriend() {
		return rand(0, 1) == 1;
	}

	protected function findJob() {
		return rand(0, 1) == 1;
	}

	protected function exercise() {
		$this->weight -= 0.2;
	}

	public function addAge() {
		$this->age++;
		if ($this->age < 26) {
			$this->height += 2;
		}
	}

	protected function addWeight($kilograms) {
		$this->weight += $kilograms;
	}

	protected function getHeight() {
		return $this->height;
	}

	protected function getWeight() {
		return $this->weight;
	}

}
