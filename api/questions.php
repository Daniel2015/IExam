<?php
require_once('../models/QuestionModel.php');
require_once('APIBase.php');

function getByTest()
{
	Permissions::OnlyAdmins();
	
	$testId = $_GET['testId'];
	$questions = (new QuestionModel)->getItems("Where test_Id='$testId'");
	
	return $questions;
}

function getByTestUser()
{
	Permissions::OnlyAuthenticated();
	
	$testId = $_GET['testId'];
	$model = new QuestionModel;
	$model->set_selectQuery("SELECT question_id, test_id, question, answer1, answer2, answer3, answer4 FROM ");
	$items = $model->getItems("Where test_id='$testId'");
	
	return $items;
	
}
function insert()
{
	Permissions::OnlyAdmins();
	
	$question = new QuestionModel;
	
	if(empty($_POST['question']))
	{
		return 'All fields are required!';
	}
	
	$question->question = $_POST['question'];
	$question->testId = $_POST['test_id'];
	$question->answer1 = $_POST['answer1'];
	$question->answer2 = $_POST['answer2'];
	$question->answer3 = $_POST['answer3'];
	$question->answer4 = $_POST['answer4'];
	$question->trueAnswer = $_POST['true_answer'];
	
	$result = $question->insert();
	
	if($result)
	{
		return 'Success';
	}
	
	return 'Error';
}
?>