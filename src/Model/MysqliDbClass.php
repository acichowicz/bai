<?php

namespace App\Model;

// use App\Model\ConfigClass;

class MysqliDbClass extends \MySQLi
{
	// protected $dbConfig;
	public $mysqli;

	public function __construct(array $dbConfig)
	{
		$this->mysqli = new \mysqli($dbConfig['db_host'], $dbConfig['db_user'], $dbConfig['db_pass'], $dbConfig['db_name']);
	}
}