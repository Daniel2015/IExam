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
if(empty($_POST['true_answer'])){
header('location:admin.php');
   exit();
}
?>
<?php
// ДА НАПРАВЯ QUERY ДАЛИ $qanswer == true_answer ОТ db.test
require_once('connection.php');
$qanswer = $_POST['true_answer'];
mysql_query("SET NAMES 'utf8'");
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
$result= "SELECT * FROM test_questions WHERE true_answer='$qanswer'";
if($result){
		echo "a";
		header("Location: test_send_success.php");
		} 
		else {
		header("Location: test_send_error.php");
		}
mysql_close($bd);
?>