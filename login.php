<?php
	if(Authentication::IsAuthenticated())
	{
		MessagePage::show("", "Вече сте се логнали!", "info", "main_login");
		exit();
	}
	if(isset($_POST['submit']))
	{
		$errmsg_arr = array();
		
		$errflag = false;
		


$asd = $_POST['username'];

if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $asd))
{

MessagePage::show("", "невъзможна данни", "warning");
}
else
{
		//sanitize funct. no sql inj allowd here.
		function clean($str) {
			$str = @trim($str);
			if(get_magic_quotes_gpc()) {
				$str = stripslashes($str);
			}
			return mysql_real_escape_string($str);
		}				
		$login = clean($_POST['username']);
		
		$salt = mysql_result(mysql_query("SELECT salt FROM simple_login WHERE username='$login'"), 0);
		$password = crypt(clean($_POST['password']), '$2a$10$' . $salt);
		
		
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
			MessagePage::show("", "Моля попълнете полетата!", "danger", "login");
			exit();
		}
		mysql_query("SET NAMES 'utf8'");
		mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
		
		$logged = Authentication::Login($login, $password);
		if($logged)
		{
			MessagePage::show("", "Влязохте успешно!", "success", "index");
			exit();
		}
		else
		{
			MessagePage::show("", "Греша Парола или Фак. Номер!", "danger");
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

	</form>

</div>
</div>
</div>
