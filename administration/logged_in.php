<?php
	if(!isset($_SESSION['log'])|| ($_SESSION['log'] != 'in'))
	{
		session_destroy();
		(new MessagePage)->show("", "Моля, влезте в системата!", "danger", "../login");
		  exit();
	}

	if(!isset($_SESSION['SESS_ADMIN_USERNAME']))
	{
		(new MessagePage)->show("", "Нямате достъп до тази страница!", "danger", "login");
		exit();
	}

	$query="SELECT * FROM logged_in_users";
	$result=mysql_query($query);
	$num=mysql_numrows($result);
	mysql_close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Вход</title>
		<link rel="stylesheet" type="text/css" href="main.css">
		<link rel="WWW Icon" href="www_icon1.ico"/>
	</head>
	<body>
			<div class="panel panel-success">
	<div class="panel-heading">
						<span><h4 style="display: inline;">Логната</h4></span>
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
						Влязъл в
						</td>
					</tr>
					<?php
					$i=0;
					while ($i < $num) {
						$field1=mysql_result($result,$i,"firstname");
						$field2=mysql_result($result,$i,"lastname");
						$field3=mysql_result($result,$i,"ID");
						$field4=mysql_result($result,$i,"username");
						$field5=mysql_result($result,$i,"loggedInTime");
					?>
					<tr class="success table-hover ">
						<td>
						<?php echo $field1; ?>
						</td>
						<td>
						<?php echo $field2; ?>
						</td>
						<td>
						<?php echo $field3; ?>
						</td>
						<td>
						<?php echo $field4; ?>
						</td>
						<td>
						<?php echo $field5; ?>
						</td>
					</tr>
					<?php
						$i++;}
					?>
				</tbody>
			</table>
	</body>
</html>