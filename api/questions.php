<?php
require_once('../models/TestModel.php');
require_once('APIBase.php');

function get()
{
	Permissions::OnlyAuthenticated();
	
	$username = $_GET['username'];
	$user = (new UsersModel)->getItems("Where username='$username'");
	return $user;
}

function insert()
{
	Permissions::OnlyAdmins();
	
	$test = new TestModel;
	
	if(empty($_POST['question']))
	{
		return 'All fields are required!';
	}
	
	$test->question = $_POST['question'];
	$test->answer1 = $_POST['answer1'];
	$test->answer2 = $_POST['answer2'];
	$test->answer3 = $_POST['answer3'];
	$test->answer4 = $_POST['answer4'];
	$test->trueAnswer = $_POST['trueAnswer'];
	
	$result = $test->insert();
	
	if($result)
	{
		return 'Success';
	}
	
	return 'Error';
}
?>