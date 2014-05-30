<?php
require_once('connection.php');
if(!isset($_SESSION['log'])|| ($_SESSION['log'] != 'in')){
session_destroy();
header('location:common pages/not_allowed.php');
   exit();
}
if(!isset($_SESSION['SESS_FIRST_NAME'])){
header('location:common pages/not_allowed_admin.php');
   exit();
}

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
		<div class="col-md-4">
	<div class="panel panel-default">
	  <div class="panel-heading">
		<span><h4 style="display: inline;">Здравей,&nbsp<?php echo $_SESSION['SESS_FIRST_NAME'];?> !</h4></span>
	  </div>
	  <div class="panel-body">
	  <p><a href="test" class="btn btn-info" >Тестове</a></p>
	  <p><a href="profile" class="btn btn-info" >Профил</a></p>
	  <p><a href="statistics" class="btn btn-info" >Статистика</a></p>
	  <p><a href="logout" class="btn btn-info" >Излез</a></p>
	  </div>
</div>
</div>
	</body>
</html>