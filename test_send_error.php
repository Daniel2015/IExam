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
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="main.css">
		<link rel="WWW Icon" href="www_icon1.ico"/>
		<title>Test send</title>
		<script>
			setTimeout(function () {
				window.location.href= 'create_test.php';
				}
				,1300);
		</script>
	</head>
	<body>
		<b>Моля, попълнете всички полета !</b>
	</body>
</html>