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
require_once('connection.php');
mysql_query("SET NAMES 'utf8'");
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
$query="SELECT * FROM simple_login";
$result=mysql_query($query);
$num=mysql_numrows($result);
mysql_close();

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
		 <span id="navtable">
			<table id="table_users">
				<tr class="tr_users" style="border-bottom:3px solid #0066FF; font-weight:bold">
					<td>
					Име
					</td>
					<td>
					Фамилия
					</td>
					<td>
					ЕГН
					</td>
					<td>
					Фак. Номер
					</td>
				</tr>
				<?php
				$i=0;
				while ($i < $num) {
					$field1=mysql_result($result,$i,"firstname");
					$field2=mysql_result($result,$i,"lastname");
					$field3=mysql_result($result,$i,"ID");
					$field4=mysql_result($result,$i,"username");
				?>
				<tr class="tr_users">
					<td>
					<?php echo $field1; ?>
					</td>
					<td>
					<?php echo $field2; ?>
					</td>
					<td>
					<?php echo $field3; ?>
					</td>
					<td>
					<?php echo $field4; ?>
					</td>
				</tr>
				<?php
					$i++;}
				?>
				</table>
			<table class="table">
				<tr><td></td></tr>
				<tr class="top">
					<td><b>Потребители</b></td>
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
					<td><a href="admin_statistics.php" class="btn" >Обща статистика</a>
					</td>
				</tr>
				<tr><td></td></tr>
					<tr>
						<td><a href="admin.php" class="btn" >Назад</a>
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
		</span>
	</body>
</html>