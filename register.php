<?php
	if(isset($_POST['submit']))
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$ID=$_POST['ID'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		mysql_query("SET NAMES 'utf8'");
		mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
		$result= mysql_query("INSERT INTO simple_login (firstname, lastname, ID, username, password)VALUES('$fname', '$lname', '$ID', '$username','".md5($password)."')" );
			if($result){
			header("Location: reg_success.php");
			} 
			else {
			header("Location: reg_error.php");
			}
		session_destroy();
	}
?>
	
<script type="text/javascript" charset="utf-8">
	alert("<?= $_GET['page'] ?>");
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
	<b>
	<table width="80px" align="center" cellpadding="0" cellspacing="0" class="table">
		<form name="reg" action="" onsubmit="return validateForm()" method="post">
			<tr><td></td></tr>
			<tr class="top">
				<td><img src="secure.png" alt="some_text" width="18" height="18"><b>&nbspРегистрация&nbsp&nbsp</b></td>
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
		</form>
	</table>
</b>