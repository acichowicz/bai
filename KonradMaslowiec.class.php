<?php

require_once 'person.abstract.php';

define('className', "KonradMaslowiec");

class KonradMaslowiec extends Person {

    protected $firstName = 'Konrad';
    protected $lastName = 'Maslowiec';
    protected $counter = 0;

    public function saveData() {
        if (!file_exists("data")) {
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

    
    


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

