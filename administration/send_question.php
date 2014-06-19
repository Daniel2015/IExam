<?php
session_start();
if(!isset($_SESSION['log'])|| ($_SESSION['log'] != 'in')){
session_destroy();
header('location:not_allowed.php');
   exit();
}
if(!isset($_SESSION['SESS_ADMIN_USERNAME'])){
header('location:not_allowed_user.php');
   exit();
   }
if(empty($_POST['question']) || empty($_POST['answer1']) || empty($_POST['answer2']) || empty($_POST['answer3']) || empty($_POST['answer4']) || empty($_POST['true_answer'])){
header('location:test_send_error.php');
   exit();
}
?>
<?php
// да преобразувам var от js към php -> вкарване в db
require_once('connection.php');

$question = $_POST['question'];
$answer1 = $_POST['answer1'];
$answer2 = $_POST['answer2'];
$answer3 = $_POST['answer3'];
$answer4 = $_POST['answer4'];
$true_answer = $_POST['true_answer'];

mysql_query("SET NAMES 'utf8'");
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
$result= mysql_query("INSERT INTO test_questions (question, answer1, answer2, answer3, answer4, true_answer)VALUES('$question', '$answer1', '$answer2', '$answer3', '$answer4', '$true_answer')" );
if($result){
		header("Location: test_send_success.php");
		} 
		else {
		header("Location: test_send_error.php");
		}
mysql_close($bd);
?>