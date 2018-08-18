<?php

require_once 'person.abstract.php';


class KrzysztofChru extends Person  {
    protected $firstName = "Krzysztof";
    protected $lastName = "Chrusciel";
    
    protected $count = 0;
    
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
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

