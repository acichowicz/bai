<?php

require_once "person.abstract.php";

class PawelKuklicz extends Person {
    protected $firstName = "Paweł";
    protected $lastName = "Kuklicz";

    private $folder;

    public function saveData(){
        $this->folder = glob('data');

        if(empty($this->folder)){
            mkdir('data');
            $this->saveText();
        }else{
            $this->saveText();
        }
    }
    private function getCounter(){
        return __METHOD__;
    }

    private function saveText(){
        file_put_contents('data/'.get_class($this).'.counter.txt', $this->getCounter());
    }
}
