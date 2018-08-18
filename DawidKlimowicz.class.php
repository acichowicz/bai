<?php

require_once 'person.abstract.php';

define('className',"DawidKlimowicz");

class DawidKlimowicz extends Person {

    protected $firstName = 'Dawid';
    protected $lastName = 'Klimowicz';
    protected $counter;
    
    public function saveData(){
        if(file_exists("data") == FALSE){
            mkdir("data");
        }
        
        file_put_contents('className'.".counter.txt", $this->counter);
    }
    
    public function getCounter(){
        $this->counter = $this->counter + 1;
        return $this->counter;
    }

}
