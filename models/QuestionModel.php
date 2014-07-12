<?php
	require_once("abstraction/ModelBase.php");

	class QuestionModel extends ModelBase
	{	
		public $id;
		
		public $testId;
		
		public $question;
		
		public $answer1;
		
		public $answer2;
		
		public $answer3;
		
		public $answer4;
		
		public $trueAnswer;
		
		public function __construct()
		{
			$this->set_tableName("test_questions");
			
			$this->fieldsMapping = array(
				'id' => 'question_id',
				'testId' => 'test_id',
				'question' => 'question',
				'answer1' => 'answer1',
				'answer2' => 'answer2',
				'answer3' => 'answer3',
				'answer4' => 'answer4',
				'trueAnswer' => 'true_answer'
			);
		}
		
		public function insert()
		{
			$testExists = mysql_result(mysql_query("SELECT COUNT(id) from tests WHERE id='$this->testId'"), 0) == 1;
			
			if(!$testExists)
			{
				return false;
			}
			
			return mysql_query("INSERT INTO test_questions 
			(question, answer1, answer2, answer3, answer4, true_answer, test_id)
			VALUES
			('$this->question', '$this->answer1', '$this->answer2', '$this->answer3', '$this->answer4', '$this->trueAnswer',
				'$this->testId')");
		}		
		
		public function update()
		{
			return mysql_query("UPDATE test_questions
				SET question='$this->question', 
					answer1='$this->answer1',
					answer2='$this->answer2',
					answer3='$this->answer3',
					answer4='$this->answer4',
					true_answer='$this->trueAnswer'
				WHERE question_id='$this->id'")
				or die(mysql_error());
		}
		
		public function delete()
		{
			return mysql_query("DELETE from test_questions WHERE question_id='$this->id'")
				or die(mysql_error());
		}	
	}
?>