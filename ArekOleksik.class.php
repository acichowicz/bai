<?php

    require_once 'person.abstract.php';
    
    interface Main{
        const count = 0;
    }

abstract class User implements Main{
        public function saveData(){
            if(!file_exists("data")){
                mkdir("data",0777);
            }         
            $myfile = fopen('data/Counter.txt', 'w');
            fwrite($myfile, $this->count);    
        }

        public function getCounter(){
            $this->count += 1;
            return $this->count;
        }
    }
    
    class ArkadiuszOleksik extends User {
        protected $firstName = "Arkadiusz";
        protected $lastName = "Oleksik";
    }
    
