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
				<p><b>Изготвили: </b></p><br>
						  Даниел Копев, ф.н. 61599 <br>
						  Диана Касаветова, ф.н. 61568 <br>
						  Здравко Петков, ф.н. 61598 <br>
						  Мариан Грауров, ф.н. 61567 <br>
						  Симеон Ненов, ф.н. 61577 <br>
						  Спас Кючучов, ф.н. 61578 <br>
						  </p>
				<p>Приятно прекарване в компанията на тестовете!</p>
			</div>
		</div>
		<?php }  ?>
		</section>

		<script type="text/javascript">
function GetClock(){
d = new Date();
nday   = d.getDay();
nmonth = d.getMonth();
ndate  = d.getDate();
nyear = d.getYear();
nhour  = d.getHours();
nmin   = d.getMinutes();
nsec   = d.getSeconds();

if(nyear<1000) nyear=nyear+1900;

     if(nhour ==  0) {ap = " AM";nhour = 12;} 
else if(nhour <= 11) {ap = " AM";} 
else if(nhour == 12) {ap = " PM";} 
else if(nhour >= 13) {ap = " PM";nhour -= 12;}

if(nmin <= 9) {nmin = "0" +nmin;}
if(nsec <= 9) {nsec = "0" +nsec;}

document.getElementById('clockbox').innerHTML=""+(nmonth+1)+"/"+ndate+"/"+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
setTimeout("GetClock()", 1000);
}
window.onload=GetClock;
</script>
 <span class="badge "><div id="clockbox"></div></span>
	</body>
	<script src="js/jquery.2.1.1.min.js" />
	<script src="js/bootstrap.min.js" />
</html>
<?php
	mysql_close($bd);
?>
