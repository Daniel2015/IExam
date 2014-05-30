<?php
	require_once("abstraction/ModelBase.php");

	class TestModel extends ModelBase
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
			$this->set_tableName("test");
		}
		
		protected function bindData($row)
		{
			$model = new UsersModel;
			
			$model->id = $row['test_id'];
			$model->answer1 = $row['answer1'];
			$model->answer2 = $row['answer2'];
			$model->answer3 = $row['answer3'];
			$model->answer4 = $row['answer4'];
			$model->trueAnswer = $row['trueAnswer'];
			
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