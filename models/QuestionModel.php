<?php
	require_once("abstraction/ModelBase.php");

	class QuestionModel extends ModelBase
	{	
		public $id;
		
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
				'question' => 'question',
				'answer1' => 'answer1',
				'answer2' => 'answer2',
				'answer3' => 'answer3',
				'answer4' => 'answer4',
				'trueAnswer' => 'trueAnswer'
			);
		}
		
		public function insert()
		{
			return mysql_query("INSERT INTO test_questions 
			(question, answer1, answer2, answer3, answer4, true_answer)
			VALUES
			('$this->question', '$this->answer1', '$this->answer2', '$this->answer3', '$this->answer4', '$this->trueAnswer')");
		}		
		
		public function update()
		{
			// TODO
		}	
	}
?>