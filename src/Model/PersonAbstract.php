<?php

namespace App\Model;

use App\Model\PersonInterface;
use App\Model\ClassNameWithoutNamespaceClass as WithoutNamespace;

abstract class PersonAbstract implements PersonInterface
{
	public function getFirstName() {
		return $this->firstName;
	}

	public function getLastName() {
		return $this->lastName;
	}

	public function saveData(string $dir)
 	{
 		if (!is_dir($dir)) {
    		mkdir($dir);
		}

		if (file_exists($dir . DIRECTORY_SEPARATOR . WithoutNamespace::getClassNameWithoutNamespace(get_class($this)) . '.counter.txt')) {
			file_put_contents($dir . DIRECTORY_SEPARATOR . WithoutNamespace::getClassNameWithoutNamespace(get_class($this)) . '.counter.txt', PHP_EOL . $this->count, FILE_APPEND);
		} else {
			file_put_contents($dir . DIRECTORY_SEPARATOR . WithoutNamespace::getClassNameWithoutNamespace(get_class($this)) . '.counter.txt', $this->count);
		}
 	}

 	public function getCounter()
 	{
 		$this->count += 1;

 		return $this->count;
 	}
}