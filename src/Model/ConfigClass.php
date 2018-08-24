<?php

namespace App\Model;

class ConfigClass
{
	public static function getConfig()
	{
		$config = include 'config.php';
		return $config;
	}
}