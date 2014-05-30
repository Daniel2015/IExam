<?php
	require_once('connection.php');
	require_once('connection.php');

	if(isset($_SESSION['SESS_ADMIN_USERNAME'])){
		session_destroy();
		header('location: index.php');
	}
	if(isset($_SESSION['SESS_FIRST_NAME'])){
		mysql_query("DELETE FROM logged_in_users WHERE username='".$_SESSION['SESS_USERNAME']."'");
		session_destroy();
		(new MessagePage)->show("Logout successful!", "", "success", "index");
	}
	else {
		header('location: index.php');
	}
	mysql_close();
?>