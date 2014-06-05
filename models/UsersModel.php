<?php
	require_once("abstraction/ModelBase.php");

	class UsersModel extends ModelBase
	{	
		public $id;
		
		public $username; // Fakulteten Nomer
		
		public $password;
		
		public $firstName;
		
		public $lastName;
		
		public $egn;
		
		public function __construct()
		{
			$this->set_tableName("simple_login");
			
			$this->fieldsMapping = array(
				'id' => 'member_id',         // <- ne ni trqbva
				'username' => 'username',
				'password' => 'password',
				'firstName' => 'firstname',
				'lastName' => 'lastname',
				'egn' => 'ID',         // <- egn = id
				'salt' => 'salt',
				);
		}
		
		public function insert()
		{
			return mysql_query("INSERT INTO simple_login
			(firstname, lastname, ID, username, password, salt)
			VALUES
			('$this->firstName', '$this->lastName', '$this->egn', '$this->username', '$this->password', '$this->salt')");
		}
		
		public function update()
		{
			//$this->password = crypt($this->password);
			return mysql_query("UPDATE simple_login
				SET firstname='$this->firstName', lastname='$this->lastName', ID='$this->egn', password='$this->password'
				WHERE username='$this->username'") or die(mysql_error());
		}	
	}
?>