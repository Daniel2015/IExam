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
header('location:admin_login.php');
   exit();
   session_destroy();
}
?>
<?php
	
	session_start();
	
	require_once('connection.php');
	
	$errmsg_arr = array();
	
	$errflag = false;
	

	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}

	$login = clean($_POST['username']);
	$password = clean($_POST['password']);

	
	 if(isset($_POST['btn']))

	if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	

	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: admin_login.php");
		exit();
	}
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
	
	$qry="SELECT * FROM admin WHERE username='$login' AND password='".md5($_POST['password'])."'";
	$result=mysql_query($qry);
	

	if($result) {
		if(mysql_num_rows($result) >= 1) {
			
			$member = mysql_fetch_assoc($result);
			$_SESSION['log'] = 'in';
			$_SESSION['SESS_ADMIN_USERNAME'] = $member['username'];
			
			header("location: admin.php");
			exit();
		}else {
			
			header("location: admin_login_error.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>