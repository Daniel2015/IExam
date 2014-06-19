<?php
	require_once("abstraction/ModelBase.php");

	class TestAnswerModel extends ModelBase
	{	
		//public $id;
		
		public $username;
		
		public $questionId;
		
		public $answer;
		
		public function __construct()
		{
			$this->set_tableName("test_answers");
			
			$this->fieldsMapping = array(
				'username' => 'username',
				'questionId' => 'question_id',
				'answer' => 'answer');
		}
		
		public function insert()
		{
			return mysql_query("INSERT INTO test_answers
			VALUES
			('$this->username', '$this->questionId', '$this->answer')");
		}
		
		public function update()
		{
			mysql_query("UPDATE test_answers
				SET answer='$this->answer' WHERE username='$this->username' AND question_id = '$this->questionId'")
				or die(mysql_error());
		}	
	}
?>