<?php
 session_start();
if(isset($_SESSION['SESS_ADMIN_USERNAME'])){
header('location:not_allowed_admin.php');
exit();
}
if(isset($_SESSION['SESS_FIRST_NAME'])){
header('location:not_allowed_user.php');
   exit();
}
if(empty($_POST['password'])){
header('location:index.php');
   exit();
   session_destroy();
}
?>

<?php
include('connection.php');
// if(isset($_POST['Submit']))
// {
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$ID=$_POST['ID'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
	$result= mysql_query("INSERT INTO simple_login (firstname, lastname, ID, username, password)VALUES('$fname', '$lname', '$ID', '$username','".md5($password)."')" );
		if($result){
		header("Location: reg_success.php");
		} 
		else {
		header("Location: reg_error.php");
		}
	session_destroy();
mysql_close($bd);
?>