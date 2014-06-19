<?php
	require_once("models/UsersModel.php");
	
	Permissions::OnlyAuthenticated();
	
	$user = new UsersModel;
	$user = $user->getItems("WHERE username='" . $_SESSION['SESS_USERNAME'] . "'")[0];
	
	if(isset($_POST['submit']))
	{
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
?><div class="panel panel-success">
		<div class="panel-heading">
			<span><h4 style="display: inline;">Профил</h4></span>
		</div>
		<div class="panel-body">
		<div class="col-md-3" style="float:left; margin-left:60px;">
		<img src="images/defaultProfile.png" style="width:96%;"/></div>
		<form name="submit" method="POST" action="" >
		<div class="col-md-7" style="float:right;">
					<div style="float:left;">					
				<p><label>Фак. Номер: <input type="text" name="username_NEW" class="form-control" id="username_NEW" value="<?= $user->username ?>" disabled="disabled" /></label></p>
				<p><label>Име: <input type="text" name="first_name_NEW" class="form-control" id="first_name_NEW" value="<?= $user->firstName ?>"/></label></p>
				<p><label>Фамилия: <input type="text" name="last_name_NEW" class="form-control" id="last_name_NEW" value="<?= $user->lastName ?>"/></label></p>
				</div>
				<div style="float:right;">
				<p><label>ЕГН: <input type="text" name="ID_NEW" class="form-control" id="ID_NEW" value="<?= $user->egn ?>"/></label></p>
				<p><label>Нова парола: <input type="password" name="password_NEW" class="form-control" id="password_NEW" /></label></p>
				</div>
				<p><input name="submit" type="submit" value="Редактирай" class="form-control btn btn-primary"/></p>
			</div>
			</form>
		</div>
	</div>