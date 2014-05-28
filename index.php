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
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="WWW Icon" href="www_icon1.ico"/>
		
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	</head>
	<body>
	<header class="bg-info">
		<h1>IExam</h1>
	</header>
	<nav class="col-md-2">
		<ul>
			<li>Home</li>
			<li>Login</li>
			<li>Register</li>
		</ul>
	</nav>
		<section class="container col-md-8">
		<?php
			if(isset($_GET['page']))
			{
				$filePath = $_GET['page'];
				if(file_exists($filePath))
				{
					require($filePath);
				}
				else
				{
					require("common pages/404.php");
				}
			}
			else
			{			
			//(new MessagePage)->show("MARAAA", "Login success", "http://abv.bg");
		?>
			<h2>Index</h2>
		<?php }  ?>
		</section>
	</body>
	<script src="js/bootstrap.min.js" />
	<script src="js/jquery.2.1.1.min.js" />
</html>

<?php
	mysql_close($bd);
?>