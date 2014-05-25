<?php
 session_start();
if(isset($_SESSION['SESS_ADMIN_USERNAME'])){
header('location:not_allowed_admin.php');
}
if(isset($_SESSION['SESS_FIRST_NAME'])){
header('location:not_allowed_user.php');
   exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
		<title>Регистрация</title>
		<link rel="stylesheet" type="text/css" href="main.css">
		<link rel="WWW Icon" href="www_icon1.ico"/>
		<script type="text/javascript" charset="utf-8">
function validateForm()
{
var a=document.forms["reg"]["fname"].value;
var b=document.forms["reg"]["lname"].value;

var c=document.forms["reg"]["ID"].value;
var d=document.forms["reg"]["username"].value;
var e=document.forms["reg"]["password"].value;
if ((a==null || a=="") && (b==null || b=="") && (c==null || c=="") && (d==null || d=="") && (e==null || e==""))
  {
  alert("Всички полета трябва да са попълнени!");
  return false;
  }
if (a==null || a=="")
  {
  alert("Моля, попълнете полето Име!");
  return false;
  }
if (b==null || b=="")
  {
  alert("Моля, попълнете полето Фамилия!");
  return false;
  }
  if (c==null || c=="")
  {
  alert("Моля, попълнете полето ЕГН!");
  return false;
  }
if (d==null || d=="")
  {
  alert("Моля, попълнете полето Фак. Номер!");
  return false;
  }
if (e==null || e=="")
  {
  alert("Моля, попълнете полето Парола!");
  return false;
  }
}
		</script>
	</head>
	<body>
		<b>
			<form name="reg" action="code_exec.php" onsubmit="return validateForm()" method="post">
				<table width="80px" align="center" cellpadding="0" cellspacing="0" id="table2" class="table">
					<tr class="top">
						<td><b><img src="secure.png" alt="some_text" width="18" height="18">&nbspРегистрация&nbsp&nbsp</b></td>
					</tr>
					<tr>
						<td><div class="err">Фак. Номер е зает</div></td>
					</tr>
					<tr>
						<td>Име:</td>
					</tr>
					<tr>
						<td><input type="text" name="fname" /></td>
					</tr>
					<tr>
						<td>Фамилия:</td>
					</tr>
					<tr>
						<td><input type="text" name="lname" /><td>
					</tr>
					<tr>
						<td>ЕГН:</td>
					</tr>
					<tr>
						<td><input type="text" name="ID" /></td>
					</tr>
					<tr>
						<td>Фак. Номер:</td>
					</tr>
					<tr>
						<td><input type="text" name="username" /></td>
					</tr>
					<tr>
						<td>Парола:</td>
					</tr>
					<tr>
						<td><input type="password" name="password" /></td>
					</tr>
					<tr>
						<td><input name="submit" type="submit" value="Регистрирай се" class="btn"/></td>
					</tr>
					<tr>
						<td><a href="main.php" class="btn" >Назад</a></td>
					</tr>
				</table>
			</form>
		</b>
	</body>
</html>