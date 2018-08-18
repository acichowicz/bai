<?php
require_once 'person.interface.php';

abstract class Person implements PersonInterface {
	protected $firstName;
	protected $lastName;
        
        protected $count;
	public function getFirstName() {
		return $this->firstName;
	}

	public function getLastName() {
		return $this->lastName;
	}
        
        public function saveData()
        {
        if (!file_exists("Data")) { mkdir("Data", 0777); }
      
        $handle = fopen("Data/KrzysztofChru.counter.txt", 'w');
        fwrite($handle, $this->count);
        }
    
        public function getCounter()
        {
            $this->count += 1;
            return $this->count;
        }
}