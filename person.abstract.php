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

    public function saveData() {
        if (file_exists("data") == FALSE) {
            mkdir("data");
        }

        file_put_contents("data/" . className . ".counter.txt", $this->counter);
    }

    public function getCounter() {
        if (file_exists("data/" . className . ".counter.txt")) {
            $this->counter = file_get_contents("data/" . className . ".counter.txt");
        }
        $this->counter = $this->counter + 1;
        echo $this->counter;
    }

}
