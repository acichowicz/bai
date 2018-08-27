<?php

namespace App\Model;

class ClassNameWithoutNamespaceClass
{
	public static function getClassNameWithoutNamespace(string $className)
 	{
 		return substr($className, strrpos($className, '\\') + 1);
 	}
}