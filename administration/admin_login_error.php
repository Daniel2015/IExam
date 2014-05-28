<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Админ</title>
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
  alert("Моля, попълнете полето Име!");
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
		<table id="table1" class="table">
			<form name="login" onsubmit="return validateForm()" method="POST" action="admin-exec.php" >
				<tr class="top">
					<td><b>Вход</b>
					</td>
				</tr>
				<tr>
					<td><b><div class="err">Грешно Име или Парола</div></b>
					</td>
				</tr>
				<tr>
					<td><b>Име:</b>
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
					<a href="main.php" class="btn" >Назад</a>
					</td>
				</tr>
			</form>
		</table>
	</body>
</html>