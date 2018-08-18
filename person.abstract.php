<?php
require_once 'person.interface.php';

abstract class Person implements PersonInterface {
	protected $firstName = 'Michał';
	protected $lastName = 'Pałys';
	protected $count;
	protected $dir = 'data';

	public function getFirstName() {
		return $this->firstName;
	}

	public function getLastName() {
		return $this->lastName;
	}

 	public function saveData()
 	{
 		if (!is_dir($this->dir)) {
    		mkdir($this->dir);
		}

		if (!file_exists($this->dir . DIRECTORY_SEPARATOR . __CLASS__ . '.counter.txt')) {
			file_put_contents($this->dir . DIRECTORY_SEPARATOR . __CLASS__ . '.counter.txt', $this->count);
		} else {
			
			return false;
		}
 	}

 	public function getCounter()
 	{
 		$this->count += 1;

 		return $this->count;
 	}
}