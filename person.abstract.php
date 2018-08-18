<?php
require_once 'person.interface.php';
abstract class Person implements PersonInterface {
	protected $firstName;
	protected $lastName;
	protected $counter;
	public function getFirstName() {
		return $this->firstName;
	}
	public function getLastName() {
		return $this->lastName;
	}
    public function getCounter($count) {
        $count = $count + 1;
        return $count;
    }
    public function saveData() {
        $folder = glob('data');
        $this->counter = $this->getCounter($this->counter);
        if (empty($folder)) {
            mkdir('data');
        }
        file_put_contents('data/'.get_class($this).'.counter.txt', $this->counter);
    }
}
