<?php
require_once("models/UsersModel.php");
	if(!isset($_SESSION['log'])|| ($_SESSION['log'] != 'in'))
	{
		session_destroy();
		(new MessagePage)->show("", "Моля, влезте в системата!", "danger", "login");
		 exit();
	}
	if(!isset($_SESSION['SESS_FIRST_NAME']))
	{
		(new MessagePage)->show("", "Нямата достъм до тази страница!", "danger", "login");
		exit();
	}
	if(isset($_POST['submit']))
	{
		// $first_name_NEW = $_POST['first_name_NEW'];
		// $last_name_NEW = $_POST['last_name_NEW'];
		// $ID_NEW = $_POST['ID_NEW'];
		// $password_NEW = $_POST['password_NEW'];
		// $password = $_POST['password'];
		
		// if (trim($password_NEW) == '' || trim($ID_NEW) =='' || trim($last_name_NEW)=='' || trim($first_name_NEW)=='' || trim($password) =='')
		// {
			// (new MessagePage)->show("Моля, попълнете всички полета.", "Неуспешно редактиране!", "danger", "profile");
			// mysql_error();
			// exit();
		// }
		// // public function update($this->firstName, $this->lastName, $this->egn, $this->username, $this->password);
		
		
		// $check = mysql_query("SELECT * FROM simple_login WHERE username='".$_SESSION['SESS_USERNAME']."' AND password='".md5($password)."'");
		
		// if ($check)
		// {
			// if(mysql_num_rows($check) >= 1)
			// {
				// mysql_query("DELETE FROM simple_login WHERE username='".$_SESSION['SESS_USERNAME']."'");
				// $result=mysql_query("INSERT INTO simple_login (username, firstname, lastname, ID, password) VALUES ('".$_SESSION['SESS_USERNAME']."','$first_name_NEW', '$last_name_NEW', '$ID_NEW', '".md5($password_NEW)."')");
				
				// if($result)
				// {
						// $_SESSION['SESS_FIRST_NAME']= $_POST['first_name_NEW'];
						// $_SESSION['SESS_LAST_NAME']= $_POST['last_name_NEW'];
						// $_SESSION['SESS_ID']= $_POST['ID_NEW'];
						
						// mysql_query("DELETE FROM logged_in_users WHERE username='".$_SESSION['SESS_USERNAME']."'");
						// mysql_query("INSERT INTO logged_in_users (firstname, lastname, ID, username, loggedInTime )VALUES('".$_SESSION['SESS_FIRST_NAME']."', '".$_SESSION['SESS_LAST_NAME']."', '".$_SESSION['SESS_ID']."', '".$_SESSION['SESS_USERNAME']."', '".$_SESSION['SESS_TIME']."')" );
						
						// mysql_close(); 
						
						// (new MessagePage)->show("", "Редактирането е успешно!", "success", "main_login");
				// }
				// else
				// {
					// mysql_error();
				// }
			// }
			// else
			// {
				// (new MessagePage)->show("Грешна парола.", "Неуспешно редактиране!", "danger");
			// }
		// }
		// else
		// {
			// mysql_error();
		// }
		
		$fname=$_POST['first_name_NEW'];
		$lname=$_POST['last_name_NEW'];
		$ID=$_POST['ID_NEW'];
		$password=$_POST['password'];
		$password_NEW=$_POST['password_NEW'];
		
		$user = new UsersModel;
		$user = $user->getItems("WHERE username='" . $_SESSION['SESS_USERNAME'] . "'")[0];
		
		$user->firstName = $fname;
		$user->lastName = $lname;
		$user->egn = $ID;
		if($password_NEW !== null && !empty($password_NEW))
		{
			$user->password = md5($password_NEW);   
		}
		
		$result= $user->update();
		if($result){
			(new MessagePage)->show("", "Редактирането е успешно!", "success", "main_login");
			exit();
		}		
	}
?>
<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading">
			<span><h4 style="display: inline;">Профил</h4></span>
		</div>
		<div class="panel-body">
			<form name="submit" method="POST" action="" >
				<p><label>Фак. Номер: <?php echo $_SESSION['SESS_USERNAME'];?></label></p>
				<p><label>Име:<input type="text" name="first_name_NEW" class="form-control" id="first_name_NEW" value="<?php echo $_SESSION['SESS_FIRST_NAME'];?>"/></label></p>
				<p><label>Фамилия: <input type="text" name="last_name_NEW" class="form-control" id="last_name_NEW" value="<?php echo $_SESSION['SESS_LAST_NAME'];?>"/></label></p>
				<p><label>ЕГН: <input type="text" name="ID_NEW" class="form-control" id="ID_NEW" value="<?php echo $_SESSION['SESS_ID'];?>"/></label></p>
				<p><label>Текуща парола: <input type="password" name="password" class="form-control" id="password" /></label></p>
				<p><label>Нова парола: <input type="password" name="password_NEW" class="form-control" id="password_NEW" /></label></p>
				<p><input name="submit" type="submit" value="Редактирай" class="form-control btn btn-primary"/></p>
				<p><a href="main_login" class="form-control btn btn-info" >Назад</a></p>
				<p><a href="logout" class="form-control btn btn-info" >Излез</a></p>
			</form>
		</div>
	</div>
</div>