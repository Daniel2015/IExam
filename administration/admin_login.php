<?php
	if(isset($_SESSION['SESS_FIRST_NAME']))
	{
		header('location:main_login.php');
		exit();
	}
	if(isset($_SESSION['SESS_ADMIN_USERNAME']))
	{
		header('location:admin.php');
		exit();
	}

if(isset($_POST['submit']))
	{

$errmsg_arr = array();
	
	$errflag = false;
	
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}

	$login = clean($_POST['username']);
	
	$query = mysql_query("SELECT salt FROM simple_login WHERE username='$login'");
	$salt = mysql_result($query, 0);
	$password = crypt(clean($_POST['password']), '$2a$10$' . $salt);
	


	if(isset($_POST['btn']))

	if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	

	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: admin_login");
		exit();
	}
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
	
	$qry="SELECT * FROM simple_login WHERE username='$login' AND password='$password' AND isAdmin='1'" ;
	$result=mysql_query($qry);
	

	if($result) {
		if(mysql_num_rows($result) >= 1) {
			
			$member = mysql_fetch_assoc($result);
			$_SESSION['log'] = 'in';
			$_SESSION['SESS_USERNAME'] = $member['username'];
			
			(new MessagePage)->show("", "Влязохте успешно!", "success", "admin");
			exit();
		}else {
			
			(new MessagePage)->show("", "Греша Парола или Фак. Номер!", "danger");
		}
	}else {
		die("Query failed");
	}

}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Админ</title>
		<script type="text/javascript" charset="utf-8">
		function validateForm()
{
var a=document.forms["submit"]["username"].value;
var b=document.forms["submit"]["password"].value;
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
		
		<div class="col-md-4">
	<div class="panel panel-default">
	  <div class="panel-heading">
		<span><img src="../images/secure.png" alt="some_text" width="21" height="21"><h4 style="display: inline;">Вход за Админи</h4></span>
	  </div>
	  <div class="panel-body">
	<form name="submit" onsubmit="return validateForm()" method="POST" action="" >
			 <div class="form-group">
				<label>Име:</label>
				<input type="text" name="username" class="form-control" id="username" />
			</div>
			<div class="form-group">
				  <label>Парола:</label>
				  <input type="password" name="password" class="form-control" id="password" onkeydown="if (event.keyCode == 13) document.getElementById('btn').click()"/>
			</div>
			<input type="submit" name="submit" class="form-control btn btn-primary" value="Влез" id="btn" />
			<a href="../index" class="btn btn-info">Назад</a>

	</form>

</div>
</div>
</div>
	</body>
</html>