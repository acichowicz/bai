<?php

    require_once 'person.abstract.php';
        
    class ArkadiuszOleksik extends Person {
        public $count = 0;
        protected $firstName = "Arkadiusz";
        protected $lastName = "Oleksik";
        public function saveData(){
            if(!file_exists("data")){
                mkdir("data",0777);
            }         
            $myfile = fopen('data/Counter.txt', 'w');
            fwrite($myfile, $this->count);    
        }        
    }
    