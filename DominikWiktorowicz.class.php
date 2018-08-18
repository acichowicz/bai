<?php
require_once 'person.abstract.php';

class DominikWiktorowicz extends Person
{
  protected $firstName = 'Dominik';
  protected $lastName = 'Wiktorowicz';


private: $folder;
public function saveData(){
  $this->folder = glob( pattern 'data');
  if (empty(this->folder)){
    mkdir (pathname 'data');
  }else{
    file_put_contents (filename 'data/pkcounter.txt', data)_
  }
}
public function getCounter(){
  return __METHOD__;
}
