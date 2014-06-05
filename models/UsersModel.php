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
				'isAdmin' => 'isAdmin'
				);
		}
		
		public function insert()
		{
			$this->encryptPassword();
			return mysql_query("INSERT INTO simple_login
			(firstname, lastname, ID, username, password, salt)
			VALUES
			('$this->firstName', '$this->lastName', '$this->egn', '$this->username', '$this->password', '$this->salt')") or die(mysql_error());
		}
		
		private function encryptPassword()
		{
			$this->salt = substr( hash('sha256', (mt_rand())), 0, 22);
			$password = crypt($this->password, '$2a$10$' . $this->salt);
		}
		
		public function update()
		{
			$this->encryptPassword();
			return mysql_query("UPDATE simple_login
				SET firstname='$this->firstName', lastname='$this->lastName', ID='$this->egn', password='$this->password',
				salt='$this->salt', isAdmin='$this->isAdmin'
				WHERE username='$this->username'") or die(mysql_error());
		}	
	}
?>