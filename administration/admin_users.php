<?php
	//$query="SELECT * FROM simple_login";
	$usersModel = new UsersModel;
	$usersModel->getItems();
	$result=$usersModel->getItems();
	//$num=mysql_numrows($result);
	
	if(isset($_POST['submit']))
	{
		$username= $_POST['submit'];
		mysql_query("UPDATE simple_login SET isAdmin='1' WHERE username='$username'");
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
	if(isset($_POST['user']))
	{
		$username= $_POST['user'];
		mysql_query("UPDATE simple_login SET isAdmin='0' WHERE username='$username'");
		mysql_close();
		MessagePage::show("", "Админа е направен Потребител!", "success", "admin_users");
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
<table class="table table-bordered">
<tr>
<td style="width:150px;">Брой Потребители:
</td>
<td class="success"><?php echo mysql_numrows(mysql_query("SELECT * FROM simple_login WHERE isAdmin='0'")); ?>
</td>
<td style="width:150px;">Брой Админи:
</td>
<td class="danger"><?php echo mysql_numrows(mysql_query("SELECT * FROM simple_login WHERE isAdmin='1'")); ?>
</td>
<td style="width:150px;">Всички:
</td>
<td class="info"><?php echo mysql_numrows(mysql_query("SELECT * FROM simple_login")); ?>
</td>
</tr>
</table> 
						
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
						Направи Потребител
						</td>
						<td>
						Изтрий Потребител
						</td>
					</tr>
					<?php
					foreach($result as $user)
					{
					?>
<?php if(!$user->isAdmin){ ?><tr class="success table-hover "> <?php } ?>
<?php if($user->isAdmin){ ?><tr class="danger table-hover "> <?php } ?>
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
						<button type="submit" name="submit" class="form-control btn btn-success" <?php if($user->isAdmin) echo 'disabled' ?> onclick="" value="<?= $user->username; ?>"/>Админ</button>
						</form>
						</td>
						<td>
						<form name="login" onsubmit="" method="POST" action="" >
						<button type="submit" name="user" class="form-control btn btn-warning" <?php if(!$user->isAdmin) echo 'disabled' ?>  onclick="" value="<?= $user->username; ?>"/>Потребител</button>
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