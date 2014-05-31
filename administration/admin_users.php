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

	$query="SELECT * FROM simple_login";
	$result=mysql_query($query);
	$num=mysql_numrows($result);
	mysql_close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Вход</title>
	</head>
	<body>
		<span>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span><h4 style="display: inline;">Потребители</h4></span>
					</div>
					<div class="panel-body">
						<p><a href="create_test" class="btn btn-info" >Създай тест</a></p>
						<p><a href="logged_in" class="btn btn-info" >Логнати</a></p>
						<p><a href="admin" class="btn btn-info" >Назад</a></p>
						<p><a href="../logout" class="btn btn-info" >Излез</a></p>
					</div>
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
					</tr>
					<?php
					$i=0;
					while ($i < $num) {
						$field1=mysql_result($result,$i,"firstname");
						$field2=mysql_result($result,$i,"lastname");
						$field3=mysql_result($result,$i,"ID");
						$field4=mysql_result($result,$i,"username");
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
						TO DO
						</td>
					</tr>
					<?php
						$i++;}
					?>
					</tbody>
				</table>
		</span>
	</body>
</html>