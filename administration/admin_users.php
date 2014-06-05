<?php
	// if(!isset($_SESSION['log'])|| ($_SESSION['log'] != 'in'))
	// {
		// session_destroy();
		// (new MessagePage)->show("", "Моля, влезте в системата!", "danger", "../login");
		  // exit();
	// }

	// if(!isset($_SESSION['SESS_ADMIN_USERNAME']))
	// {
		// (new MessagePage)->show("", "Нямате достъп до тази страница!", "danger", "login");
		// exit();
	// }

	
	//$query="SELECT * FROM simple_login";
	$usersModel = new UsersModel;
	$usersModel->getItems();
	$result=$usersModel->getItems();
	//$num=mysql_numrows($result);
	
	if(isset($_POST['submit']))
	{
		$username= $_POST['submit'];
		mysql_query("UPDATE simple_login SET isAdmin='1' WHERE username='$username'");
		// $querys="SELECT * FROM simple_login WHERE username='$username'";
		// $results=mysql_query($querys);
		// $password=mysql_result($results,0,"password");
		// $salt=mysql_result($results,0,"salt");
		// mysql_query("DELETE FROM simple_login WHERE username='$username'");
		// // mysql_query("DELETE FROM logged_in_users WHERE username='$username'");
		// mysql_query("INSERT INTO admin (username, password, salt) VALUES ('$username', '$password', '$salt') ");
		mysql_close();
		MessagePage::show("", "Потребителят е направен Админ!", "success", "admin_users");
		exit();
		mysql_close();
	}

	if(isset($_POST['delete']))
	{
		$username= $_POST['delete'];
		mysql_query("DELETE FROM simple_login WHERE username='$username'");
		// mysql_query("DELETE FROM logged_in_users WHERE username='$username'");
		mysql_query("DELETE FROM messages WHERE fromUser='$username' OR toUser='$username'");
		MessagePage::show("", "Потребителят е Изтрит!", "success", "admin_users");
		exit();
		mysql_close();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Вход</title>
	</head>
	<body>
	<div class="panel panel-success">
	<div class="panel-heading">
		
						<span><h4 style="display: inline;">Потребители</h4></span>
					</div>
					<div class="panel-body">
						<div class="btn-group">
						<a href="admin" class="btn btn-info" >Назад</a>
						</div>
					</div>
			
				<table class="table table-bordered table-hover table-condensed">
				<tbody>
					<tr class="active table-hover">
						<td>
						Име
						</td>
						<td>
						Фамилия
						</td>
						<td>
						ЕГН
						</td>
						<td>
						Фак. Номер
						</td>
						<td>
						Направи Админ
						</td>
						<td>
						Изтрий Потребител
						</td>
					</tr>
					<?php
					foreach($result as $user)
					{
					?>
					<tr class="success table-hover ">
						<td>
						<?= $user->firstName; ?>
						</td>
						<td>
						<?= $user->lastName; ?>
						</td>
						<td>
						<?= $user->egn; ?>
						</td>
						<td>
						<?= $user->username; ?>
						</td>
						<td>
						<form name="login" onsubmit="" method="POST" action="" >
						<button type="submit" name="submit" class="form-control btn btn-success <?php if($user->isAdmin) echo 'disabled' ?>" onclick="" value="<?= $user->username; ?>"/>Админ</button>
						</form>
						</td>
						<td>
						<form name="login" onsubmit="" method="POST" action="" >
						<button type="submit" name="delete" class="form-control btn btn-danger" onclick="" value="<?= $user->username; ?>"/>Изтрий</button>
						</form>
						</td>
					</tr>
					<?php
					}
					?>
					</tbody>
				</table>				
		</div>
	</body>
</html>