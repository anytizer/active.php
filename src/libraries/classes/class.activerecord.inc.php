<?php
class activerecord extends database
{
	// get columns
	private $table_name;
	private $pk_field_name;
	private $pk_field_value;
	
	private $success = false;
	private $allowed_fields = array();
	
	public function __construct(string $table_name, string $pk_field_name, $pk_field_value, array $allowed_fields)
	{
		parent::__construct();
		$this->setup($table_name, $pk_field_name, $pk_field_value, $allowed_fields);
	}
	
	public function __set(string $field_name, string $field_value)
	{
		# UPDATE
		$sql="UPDATE `{$this->table_name}` SET `{$field_name}`=:field_value WHERE `{$this->pk_field_name}`=:pk_field_value;";
		$statement = $this->connection->prepare($sql);
		$statement->bindValue(":field_value", $field_value);
		$statement->bindValue(":pk_field_value", $this->pk_field_value);
		$statement->execute();
	}
	
	public function __get(string $field_name)
	{
		# SELECT
		$sql="SELECT `{$field_name}` FROM `{$this->table_name}` WHERE `{$this->pk_field_name}`='{$this->pk_field_value}';";
		$statement = $this->connection->prepare($sql);
		$statement->execute();
		
		$result = $statement->fetch(\PDO::FETCH_ASSOC);
		
		#print_r($result);
		return $result[$field_name];		
		#return $field_name;
	}

	protected function setup(string $table_name, string $pk_field_name, $pk_field_value, array $allowed_fields)
	{
		$this->table_name = $table_name;
		$this->pk_field_name = $pk_field_name;
		$this->pk_field_value = $pk_field_value;
	}
}