<?php
	require_once("QuestionModel.php");

	class QuestionViewModel extends QuestionModel
	{	
		public $answer;
		
		public function __construct()
		{
			parent::__construct();
			
			$this->fieldsMapping['answer'] = 'answer';
		}	
	}
?>