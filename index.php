<?php
session_start();
// if(isset($_SESSION['SESS_ADMIN_USERNAME'])){
// header('location:not_allowed_admin.php');
// }
// if(isset($_SESSION['SESS_FIRST_NAME'])){
// header('location:not_allowed_user.php');
   // exit();
// }

require_once("utilities/SecurityManager.php");
$securityManager = new SecurityManager;
$securityManager->escapeAll();

$ProjectName = "IExam";

require_once('connection.php');
require_once("Authentication.php");
require_once("Permissions.php");
require_once('utilities/MessagePage.php');

mysql_query("SET NAMES 'utf8'");
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
		<title>Регистрация в IExam</title>
		
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="WWW Icon" href="images/www_icon1.ico"/>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	</head>
	<body>
	<header>
		<h1 class="col-md-offset-1"><span class="glyphicon glyphicon-pencil"></span>IExam</h1>
	</header>
	<nav id="navigation" class="col-md-2">
		<?php
			include('navigation.php');
		?>
	</nav>
		<section class="container col-md-8">
		<?php
			if(isset($_GET['page']))
			{
				$filePath = $_GET['page'];
				if(file_exists($filePath . ".php"))
				{
					require($filePath . ".php");
				}
				else
				{
					require("common pages/404.php");
				}
			}
			else
			{
			//(new MessagePage)->show("Login success", "Login success", "profile");
		?>
		<div class="panel panel-success">
			<div class="panel-heading">
				<p><h2 style="display: inline;">Система за тестове!</h2></p>
				<br>
				<p><b>Изготвили: </b><br>
						  Даниел Копев, ф.н. 61599 <br>
						  Диана Касаветова, ф.н. 61568 <br>
						  Здравко Петков, ф.н. 61598 <br>
						  Мариан Грауров, ф.н. 61567 <br>
						  Симеон Ненов, ф.н. 61577 <br>
						  Спас Кючучов, ф.н. 61578 <br>
						  </p>
				<p>Приятно прекарване в компанията на тестовете!</p>

		<?php }  ?>
		</section>
	</body>
	<script src="js/jquery.2.1.1.min.js" />
	<script src="js/bootstrap.min.js" />
</html>

<?php
	mysql_close($bd);
?>
