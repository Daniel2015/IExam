<?php
 session_start();
if(isset($_SESSION['SESS_ADMIN_USERNAME'])){
header('location:not_allowed_admin.php');
}
if(isset($_SESSION['SESS_FIRST_NAME'])){
header('location:not_allowed_user.php');
   exit();
}

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
		<div>
		<?php
			if(isset($_GET['page']))
			{
				include($_GET['page']);
			}
			
			//(new MessagePage)->show("MARAAA", "Login success", "http://abv.bg");
		?>
		</div>
	</body>
</html>