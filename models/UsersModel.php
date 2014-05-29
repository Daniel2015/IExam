<?php
	require_once("abstraction/ModelBase.php");

	class UsersModel extends ModelBase
	{	
		public $id;
		
		public $username;
		
		public $password;
		
		public $firstName;
		
		public $lastName;
		
		public $fn; // Fakulteten nomer
		
		public function __construct()
		{
			$this->set_tableName("simple_login");
		}
		
		protected function bindData($row)
		{
			$model = new UsersModel;
			
			$model->id = $row['member_id'];
			$model->username = $row['username'];
			$model->password = $row['password'];
			$model->firstName = $row['firstname'];
			$model->lastName = $row['lastname'];
			$model->fn = $row['ID'];
			
			return $model;
		}
		
		public function insert()
		{
			return mysql_query("INSERT INTO simple_login
			(firstname, lastname, ID, username, password)
			VALUES
			('$this->firstName', '$this->lastName', '$this->fn', '$this->username', '".md5($this->password)."')");
			//or die('Registration faild: ' . mysql_error());
		}		
		
		public function update()
		{
			// TODO
		}	
	}
?>