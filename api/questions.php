<?php
require_once('../models/QuestionModel.php');
require_once('APIBase.php');

function get()
{
	Permissions::OnlyAuthenticated();
	
	//Ne triabva li da se escapne? A require na UserModel?
	$username = $_GET['username'];
	$user = (new UsersModel)->getItems("Where username='$username'");
	return $user;
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