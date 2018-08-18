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
		if(file_exists('data'))
		{
			$file=fopen('data/'.__CLASS__.'.counter.txt', 'w');
			fwrite($file, (string) $this->count);
			fclose($file);
			return true;
		}
		else
		{
			mkdir('data');
			return false;
		}
	} 

	public function getCounter()
	{
		$this->count++;
		return $this->count;
	} 


}