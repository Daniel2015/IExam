<?php
session_start();
require_once('connection.php');
if(!isset($_SESSION['log'])|| ($_SESSION['log'] != 'in')){
session_destroy();
header('location:not_allowed.php');
   exit();
}
if(isset($_GET['log']) && ($_GET['log']=='out')){
mysql_query("SET NAMES 'utf8'");
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
$result =mysql_query("DELETE FROM logged_in_users WHERE username='".$_SESSION['SESS_USERNAME']."'");
mysql_close();
session_destroy();
header('location:main.php');
}
if(!isset($_SESSION['SESS_FIRST_NAME'])){
header('location:not_allowed_admin.php');
   exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Статистика</title>
		<link rel="stylesheet" type="text/css" href="main.css">
		<link rel="WWW Icon" href="www_icon1.ico"/>
	
	</head>
	<body>
	<table class="table">
				<tr><td></td></tr>
				<tr class="top">
					<td><b>Статистика</b>
					</td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><a href="test.php" class="btn" >Тестове</a>
					</td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><a href="profile.php" class="btn" >Профил</a>
					</td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><a href="main_login.php" class="btn" >Назад</a>
					</td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><a href="?log=out" class="btn" >Излез</a>
					</td>
				</tr>
				<tr><td></td></tr>
			</table>

	</body>
</html>