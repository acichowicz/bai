<?php

namespace App\Model;

class ConfigClass
{
	public static function getDbConfig()
	{
		$config = include 'db_config.php';
		return $config;
	}

	public static function getMailerConfig()
	{
		$config = include 'mailer_config.php';
		return $config;
	}
}