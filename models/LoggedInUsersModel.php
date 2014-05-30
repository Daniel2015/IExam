<?php
	require_once("abstraction/ModelBase.php");

	class LoggedInUsersModel extends ModelBase
	{	
		public $id;
		
		public $memberId;
		
		public $username;
		
		public $firstName;
		
		public $lastName;
		
		public $loggedInTime;
		
		public function __construct()
		{
			$this->set_tableName("logged_in_users");
		}
		
		protected function bindData($row)
		{
			$model = new UsersModel;
			
			$model->id = $row['ID'];
			$model->username = $row['username'];
			$model->firstName = $row['firstname'];
			$model->lastName = $row['lastname'];
			$model->loggedInTime = $row['loggedInTime'];
			
			return $model;
		}
		
		public function insert()
		{
			// TODO
		}		
		
		public function update()
		{
			// TODO
		}	
	}
?>