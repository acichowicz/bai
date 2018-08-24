<?php

namespace App\Model;

use App\Model\PersonAbstract;

 /**
 * My main class.
 */
 class MichalPalys extends PersonAbstract
 {
 	protected $dir = 'data';
 	protected $count;

 	public function saveData()
 	{
 		if (!is_dir($this->dir)) {
    		mkdir($this->dir);
		}

		if (!file_exists($this->dir . DIRECTORY_SEPARATOR . $this->getClassNameWithoutNamespace(get_called_class()) . '.counter.txt')) {
			file_put_contents($this->dir . DIRECTORY_SEPARATOR . $this->getClassNameWithoutNamespace(get_called_class()) . '.counter.txt', $this->count);
		} else {
			
			return false;
		}
 	}

 	public function getCounter()
 	{
 		$this->count += 1;

 		return $this->count;
 	}

 	protected function getClassNameWithoutNamespace(string $className)
 	{
 		return substr($className, strrpos($className, '\\') + 1);
 	}
 }