<?php

namespace App\Model;

/**
* Validate values when user register.
*/
class ValidationModel
{
	/**
	* Return true if checking string has spaces.
	* 
	* @param string value to seek spaces
	*
	* @return boolean
	*/
	public static function hasSpaces(string $str): bool
	{
		if ($str !== trim($str) || (bool)(strpos($str, ' ')) === true) {

			return true;
		}

		return false;
	}
}