<?php
session_start();

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
		<link rel="stylesheet" href="css/protos-ui.css">
		
		
		<script src="js/jquery.2.1.1.min.js" ></script>
		<script src="js/bootstrap.min.js" ></script>
		<script src="js/jquery.protos-ui.min.js" ></script>
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
		?>
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h3 style="display: inline;">Система за тестове <i>IExam </i>!</h3>
				</div>
				<div class="panel-body">
				<p>Приятно прекарване в компанията на тестовете!</p>
			</div>
		</div>
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h3 style="display: inline;">Статистика на <i>IExam </i>!</h3>
				</div>
				<div class="panel-body">
				<ul class="nav nav-stacked">
					<li class="active"> <a><span class="badge pull-right"><?php echo mysql_num_rows(mysql_query("SELECT * FROM simple_login")); ?></span>Брой регистрирани потребители:</a></li>
					<li class="active"> <a><span class="badge pull-right"><?php echo mysql_num_rows(mysql_query("SELECT * FROM test_questions")); ?></span>Брой въпроси:</a></li>
					<li class="active"> <a><span class="badge pull-right"><?php echo mysql_num_rows(mysql_query("SELECT * FROM simple_login WHERE isAdmin='1'")); ?></span>Брой админи:</a></li>
				</ul>
				</div>
		</div>
		<?php }  ?>
		</section>
 	<aside id="navigation2" class="col-md-2">
		<?php
			include('navigation_right.php');
		?>
		</aside>
<footer id="footer">
<center>
<i>Copyright © <?php echo date("Y"); ?> IExam | All Rights Reserved.</i> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <i>Contact us: <a href="https://github.com/Daniel2015/IExam" target="_blank">github.com/Daniel2015/IExam</a></i>
</center>
</footer>
	</body>
</html>
<?php
	mysql_close($bd);
?>