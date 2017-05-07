<?php
namespace common;

abstract class database
{
	protected $connection;
	
	public function __construct()
	{
		$username = "root";
		$password = "";
		$options = array(
			\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8;",
		);
		
		$this->connection = new \PDO("mysql:host=localhost;port=3306;dbname=users", $username, $password, $options);
		$this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	}
	
	abstract protected function setup(string $table_name, string $pk_name, $pk_value, array $allowed_fields);
}