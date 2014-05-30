<?php
	if(isset($_SESSION['SESS_FIRST_NAME']))
	{
		header('location: main_login');
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
		
		
		//sanitize funct. no sql inj allowd here.
		function clean($str) {
			$str = @trim($str);
			if(get_magic_quotes_gpc()) {
				$str = stripslashes($str);
			}
			return mysql_real_escape_string($str);
		}
		
		$login = clean($_POST['username']);
		$password = clean($_POST['password']);
		
		//inputs validation
		
		
		
		if($login == '') {
			$errmsg_arr[] = 'Login ID missing';
			$errflag = true;
		}
		if($password == '') {
			$errmsg_arr[] = 'Password missing';
			$errflag = true;
		}
		
		//if inputs are empty
		if($errflag) {
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			session_write_close();
			header("location: main.php");
			exit();
		}
		mysql_query("SET NAMES 'utf8'");
		mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
		
		$qry="SELECT * FROM simple_login WHERE username='$login' AND password='".md5($_POST['password'])."'";
		$result=mysql_query($qry);
		
		if($result) 
		{
			if(mysql_num_rows($result) >= 1) 
			{
				date_default_timezone_set('Europe/Sofia');
				$member = mysql_fetch_assoc($result);
				$_SESSION['log'] = 'in';
				$_SESSION['SESS_ID'] = $member['ID'];
				$_SESSION['SESS_FIRST_NAME'] = $member['firstname'];
				$_SESSION['SESS_LAST_NAME'] = $member['lastname'];
				$_SESSION['SESS_USERNAME'] = $member['username'];
				$_SESSION['SESS_TIME'] = date("Y-m-d H:i:s");
				
				mysql_query("INSERT INTO logged_in_users (firstname, lastname, ID, username, loggedInTime )VALUES('".$_SESSION['SESS_FIRST_NAME']."', '".$_SESSION['SESS_LAST_NAME']."', '".$_SESSION['SESS_ID']."', '".$_SESSION['SESS_USERNAME']."', '".$_SESSION['SESS_TIME']."')" )
				or die("Login failed: " . mysql_error());
				
				(new MessagePage)->show("", "Влязохте успешно!", "success");
				header("refresh:2;url=main_login");
				exit();
			}
			else
			{
				(new MessagePage)->show("", "Греша Парола или Фак. Номер!", "danger");
			}
		}
	}
?>
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
<div class="col-md-4">
	<div class="panel panel-default">
	  <div class="panel-heading">
		<span><img src="images/secure.png" alt="some_text" width="21" height="21"><h4 style="display: inline;">Вход</h4></span>
	  </div>
	  <div class="panel-body">
	<form name="login" onsubmit="return validateForm()" method="POST" action="" >
			 <div class="form-group">
				<label>Фак. Номер:</label>
				<input type="text" name="username" class="form-control" id="username" />
			</div>
			<div class="form-group">
				  <label>Парола:</label>
				  <input type="password" name="password" class="form-control" id="password" onkeydown="if (event.keyCode == 13) document.getElementById('btn').click()"/>
			</div>
			<input type="submit" name="submit" class="form-control btn btn-primary" value="Влез" id="btn" />
			<a href="register" class="btn btn-info">Регистрация</a>
			<a href="administration/admin_login.php" class="btn btn-info">Вход за Админи</a>

	</form>

</div>
</div>
</div>