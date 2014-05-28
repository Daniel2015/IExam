<?php
session_start();
if(!isset($_SESSION['log'])|| ($_SESSION['log'] != 'in')){
session_destroy();
header('location:not_allowed.php');
   exit();
}
if(isset($_GET['log']) && ($_GET['log']=='out')){
session_destroy();
header('location:main.php');
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
		<title>Вход</title>
		<link rel="stylesheet" type="text/css" href="main.css">
		<link rel="WWW Icon" href="www_icon1.ico"/>
	
	</head>
	<body>
	<table class="table">
				<tr><td></td></tr>
				<tr class="top">
					<td><b>Здравей,&nbsp<?php echo $_SESSION['SESS_ADMIN_USERNAME'];?> !</b></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><a href="create_test.php" class="btn" >Създай тест</a>
					</td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><a href="logged_in.php" class="btn" >Логнати</a>
					</td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><a href="admin_users.php" class="btn" >Потребители</a>
					</td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><a href="admin_statistics.php" class="btn" >Обща статистика</a>
					</td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td>
					<a href="?log=out" class="btn" >Излез</a>
					</td>
				</tr>
				<tr><td></td></tr>
			</table>
	</body>
</html>