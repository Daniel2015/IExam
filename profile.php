<?php
	require_once("models/UsersModel.php");
	
	Permissions::OnlyAuthenticated();
	
	$user = new UsersModel;
	$user = $user->getItems("WHERE username='" . $_SESSION['SESS_USERNAME'] . "'")[0];
	
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
		$password_NEW=$_POST['password_NEW'];
		
		$user->firstName = $fname;
		$user->lastName = $lname;
		$user->egn = $ID;
		
		if($password_NEW !== null && !empty($password_NEW))
		{
			$user->password = $password_NEW;
			$user->encryptPassword();
		}
		
		$result= $user->update();
		if($result){
			(new MessagePage)->show("", "Редактирането е успешно!", "success", "index");
			$_SESSION['SESS_FIRST_NAME']= $_POST['first_name_NEW'];
			exit();
		}
	}
?>
	<div class="panel panel-success">
		<div class="panel-heading">
			<span><h4 style="display: inline;">Профил</h4></span>
		</div>
		<div class="panel-body">
		<div class="col-md-3">
			<form name="submit" method="POST" action="" >
										
				<p><label>Фак. Номер: <input type="text" name="username_NEW" class="form-control" id="username_NEW" value="<?= $user->username ?>" disabled="disabled" /></label></p>
				<p><label>Име: <input type="text" name="first_name_NEW" class="form-control" id="first_name_NEW" value="<?= $user->firstName ?>"/></label></p>
				<p><label>Фамилия: <input type="text" name="last_name_NEW" class="form-control" id="last_name_NEW" value="<?= $user->lastName ?>"/></label></p>
				<p><label>ЕГН: <input type="text" name="ID_NEW" class="form-control" id="ID_NEW" value="<?= $user->egn ?>"/></label></p>
				<p><label>Нова парола: <input type="password" name="password_NEW" class="form-control" id="password_NEW" /></label></p>
				<p><input name="submit" type="submit" value="Редактирай" class="form-control btn btn-primary"/></p>
			</form>
			</div>
		</div>
	</div>