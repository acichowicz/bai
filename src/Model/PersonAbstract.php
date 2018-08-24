<?php

namespace App\Model;

use App\Model\PersonInterface;

abstract class PersonAbstract implements PersonInterface {
	protected $firstName = 'Michał';
	protected $lastName = 'Pałys';
	// protected $count;

	public function getFirstName() {
		return $this->firstName;
	}

	public function getLastName() {
		return $this->lastName;
	}
}