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

	public function saveData()
	{
		if (!file_exists('data'))
		{
			mkdir('data');
		}
		if (!file_exists('data/ErnestZakrzewski.counter.txt'))
		{
			touch('data/ErnestZakrzewski.counter.txt');
		}
	}

	public function getCounter()
	{
		$fileCounter = file_get_contents('data/ErnestZakrzewski.counter.txt');
		if ($fileCounter=='')
		{
			$fileCounter = 1;
		}
		$fileCounter++;
		file_put_contents('data/ErnestZakrzewski.counter.txt', $fileCounter);

		$this->count = $this->count+1;
	}
}
