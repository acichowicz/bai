<?php
require_once 'person.interface.php';

abstract class Person implements PersonInterface {
	protected $firstName;
	protected $lastName;
	public function getFirstName() {
		return $this->firstName;
	}

	public function getLastName() {
		return $this->lastName;
	}
}