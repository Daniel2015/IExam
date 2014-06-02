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
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Вход</title>
	</head>
	<body>
	
		<div class="col-md-4">
	<div class="panel panel-default">
	  <div class="panel-heading">
		<span><h4 style="display: inline;">Здравей,&nbsp<?php echo $_SESSION['SESS_ADMIN_USERNAME'];?> !</h4></span>
	  </div>
	  <div class="panel-body">
	  <p><a href="create_test" class="btn btn-info" >Създай тест</a></p>
	  <p><a href="logged_in" class="btn btn-info" >Логнати</a></p>
	  <p><a href="admin_users" class="btn btn-info" >Потребители</a></p>
	  <p><a href="mailAdmin" class="btn btn-info" >Поща</a></p>
	  <p><a href="../logout" class="btn btn-info" >Излез</a></p>
	  </div>
</div>
</div>
			
	</body>
</html>