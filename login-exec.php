<?php
session_start();
if(isset($_SESSION['SESS_FIRST_NAME'])){
header('location:main_login.php');
   exit();
   }
if(isset($_SESSION['SESS_ADMIN_USERNAME'])){
header('location:admin.php');
   exit();
   }
if(empty($_POST['password'])){
header('location:main.php');
   exit();
}
?>
<?php
session_start();
	require_once('connection.php');
	$errmsg_arr = array();
	
	$errflag = false;
	
	
	//sanitize funct. no sql inj allowd here.
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	$login = clean($_POST['username']);
	$password = clean($_POST['password']);
	
	//inputs validation
	


	if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//if inputs are empty
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: main.php");
		exit();
	}
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

	$qry="SELECT * FROM simple_login WHERE username='$login' AND password='".md5($_POST['password'])."'";
	$result=mysql_query($qry);
	
	if($result) {
		if(mysql_num_rows($result) >= 1) {
		date_default_timezone_set('UTC+2');
			$member = mysql_fetch_assoc($result);
			$_SESSION['log'] = 'in';
			$_SESSION['SESS_ID'] = $member['ID'];
			$_SESSION['SESS_FIRST_NAME'] = $member['firstname'];
			$_SESSION['SESS_LAST_NAME'] = $member['lastname'];
			$_SESSION['SESS_USERNAME'] = $member['username'];
			$_SESSION['SESS_TIME'] = date("Y-m-d H:i:s");
			
			mysql_query("INSERT INTO logged_in_users (firstname, lastname, ID, username, loggedInTime )VALUES('".$_SESSION['SESS_FIRST_NAME']."', '".$_SESSION['SESS_LAST_NAME']."', '".$_SESSION['SESS_ID']."', '".$_SESSION['SESS_USERNAME']."', '".$_SESSION['SESS_TIME']."')" );
						

			header("location: main_login.php");
exit();
		}else {

			header("location: login_error.php");
			exit();
		}
	}
?>