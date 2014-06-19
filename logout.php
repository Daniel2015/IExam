<?php
	require_once('connection.php');

	if(isset($_SESSION['SESS_ADMIN_USERNAME'])){
		session_destroy();
		MessagePage::show("", "Излязохте успешно!", "success", "index");
		exit();
	}
	if(isset($_SESSION['SESS_FIRST_NAME'])){
		mysql_query("DELETE FROM logged_in_users WHERE username='".$_SESSION['SESS_USERNAME']."'");
		session_destroy();
		
		MessagePage::show("", "Излязохте успешно!", "success", "index");
	}
	else {
		MessagePage::show("", "Нямата достъп до тази страница!", "danger", "index");
	}
?>