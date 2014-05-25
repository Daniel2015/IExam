<?php
session_start();

if(isset($_SESSION['SESS_FIRST_NAME'])){
header('location:main_login.php');
   exit();
}
if(isset($_SESSION['SESS_ADMIN_USERNAME'])){
header('location:admin.php');
   exit();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Main</title>
		<link rel="stylesheet" type="text/css" href="main.css">
		<link rel="WWW Icon" href="www_icon1.ico"/>
		<script type="text/javascript" charset="utf-8">
		function validateForm()
{
var a=document.forms["login"]["username"].value;
var b=document.forms["login"]["password"].value;
if ((a==null || a=="") && (b==null || b==""))
  {
  alert("Всички полета трябва да са попълнени!");
  return false;
  }
if (a==null || a=="")
  {
  alert("Моля, попълнете полето Фак. Номер!");
  return false;
  }
if (b==null || b=="")
  {
  alert("Моля, попълнете полето Парола!");
  return false;
  }
}
</script>
	</head>
	<body>
		<table class="table">
			<form name="login" onsubmit="return validateForm()" method="POST" action="login-exec.php" >
				<tr><td></td></tr>
				<tr class="top">
					<td><b>Вход</b>
					</td>
				</tr>
				<tr>
					<td><b>Фак. Номер:</b>
					</td>
				</tr>
				<tr>
					<td>
					<input type="text" name="username" class="textfield" id="username" />
					</td>
				</tr>
					<tr>
					<td>
					<b>Парола:</b>
					</td>
				</tr>
				<tr>
					<td>
					<input type="password" name="password" class="textfield" id="password" onkeydown="if (event.keyCode == 13) document.getElementById('btn').click()"/>
					</td>
				</tr>
				<tr>
					<td>
					<input type="submit" class="btn" value="Влез" id="btn" />
					</td>
				</tr>
				<tr>
					<td>
					<a href="index.php" class="btn" >Регистрация</a>
					</td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td>
					<a href="admin_login.php" class="btn" >Вход за Админи</a>
					</td>
				</tr>
			</form>
		</table>
	</body>
</html>