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
<?php
require_once('connection.php');
mysql_query("SET NAMES 'utf8'");
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
$query="SELECT * FROM test";
$result=mysql_query($query);
$num=mysql_numrows($result);
mysql_close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Профил</title>
		<link rel="stylesheet" type="text/css" href="main.css">
		<link rel="WWW Icon" href="www_icon1.ico"/>
	</head>
	<body>
		 <span id="testtable">
			<table id="table_test">
				<tr class="tbl_test" style="border-bottom:3px solid #0066FF; font-weight:bold">
					<td>
					Въпрос
					</td>
					<td>
					A
					</td>
					<td>
					B
					</td>
					<td>
					C
					</td>
					<td>
					D
					</td>
					<td>
					Отговор
					</td>
					<td>
					</td>
				</tr>
				<?php
				$i=0;
				while ($i < $num) {
					$field1=mysql_result($result,$i,"question");
					$field2=mysql_result($result,$i,"answer1");
					$field3=mysql_result($result,$i,"answer2");
					$field4=mysql_result($result,$i,"answer3");
					$field5=mysql_result($result,$i,"answer4");
					$field6=mysql_result($result,$i,"true_answer");
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
					<td>
					<?php echo $field5; ?>
					</td>
					<td ><form action="submit_test" onsubmit="" name="test_form">
					<input type="radio" name="true_answer" value="A"><?php echo $field2;?><br>
					<input type="radio" name="true_answer" value="B"><?php echo $field3;?><br>
					<input type="radio" name="true_answer" value="C"><?php echo $field4;?><br>
					<input type="radio" name="true_answer" value="D"><?php echo $field5;?><br>
					</td>
					<td>
					<input name="submit" type="submit" value="Готово" class="btn"/>
					</form>
					</td>
				</tr>
				<?php
					$i++;}
				?>
				<!-- ДА ОПРАВЯ ФОРМАТА. "ГОТОВО" ВКАРВА ВСИЧКИ questions В db -->
				</table>
		<table class="table">
					<tr><td></td></tr>
					<tr class="top">
						<td><b>Тестове</b></td>
					</tr>
					<tr><td></td></tr>
					<tr>
						<td><a href="profile.php" class="btn" >Профил</a>
						</td>
					</tr>
					<tr><td></td></tr>
					<tr>
						<td><a href="statistics.php" class="btn" >Статистика</a>
						</td>
					</tr>
					<tr><td></td></tr>
					<tr>
						<td><a href="main_login.php" class="btn" >Назад</a>
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