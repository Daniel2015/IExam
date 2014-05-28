<?php
session_start();
if(isset($_SESSION['SESS_ADMIN_USERNAME'])){
header('location:not_allowed_admin.php');
}
if(isset($_SESSION['SESS_FIRST_NAME'])){
header('location:not_allowed_user.php');
   exit();
}

require('connection.php');
require('utilities/MessagePage.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
		<title>Регистрация в IExam</title>
		<link rel="stylesheet" type="text/css" href="main.css">
		<link rel="WWW Icon" href="www_icon1.ico"/>
	</head>
	<body>
	<h1>IExam</h1>
		<div>
		<?php
			if(isset($_GET['page']))
			{
				require($_GET['page']);
			}
			else
			{			
			//(new MessagePage)->show("MARAAA", "Login success", "http://abv.bg");
		?>
			<h2>Index</h2>
		<?php }  ?>
		</div>
	</body>
</html>

<?php
	mysql_close($bd);
?>