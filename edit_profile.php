<?php
	$first_name_NEW = $_POST['first_name_NEW'];
	$last_name_NEW = $_POST['last_name_NEW'];
	$ID_NEW = $_POST['ID_NEW'];
	$password_NEW = $_POST['password_NEW'];
	
	if (trim($password_NEW) == '' || trim($ID_NEW) =='' || trim($last_name_NEW)=='' || trim($first_name_NEW)=='')
	{
		(new MessagePage)->show("Моля, попълнете всички полета.", "Неуспешно редактиране!", "danger", "profile");
		mysql_error();
		exit();
	}
	
	mysql_query("DELETE FROM simple_login WHERE username='".$_SESSION['SESS_USERNAME']."'");
	$result=mysql_query("INSERT INTO simple_login (username, firstname, lastname, ID, password) VALUES ('".$_SESSION['SESS_USERNAME']."','$first_name_NEW', '$last_name_NEW', '$ID_NEW', '".md5($password_NEW)."')");
	
	
	if($result)
	{
		$_SESSION['SESS_FIRST_NAME']= $_POST['first_name_NEW'];
		$_SESSION['SESS_LAST_NAME']= $_POST['last_name_NEW'];
		$_SESSION['SESS_ID']= $_POST['ID_NEW'];
		
		mysql_query("DELETE FROM logged_in_users WHERE username='".$_SESSION['SESS_USERNAME']."'");
		mysql_query("INSERT INTO logged_in_users (firstname, lastname, ID, username, loggedInTime )VALUES('".$_SESSION['SESS_FIRST_NAME']."', '".$_SESSION['SESS_LAST_NAME']."', '".$_SESSION['SESS_ID']."', '".$_SESSION['SESS_USERNAME']."', '".$_SESSION['SESS_TIME']."')" );
		
		mysql_close(); 
		
		(new MessagePage)->show("", "Редактирането е успешно!", "success", "main_login");
	}
?>