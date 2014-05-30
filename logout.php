<?php
require_once('connection.php');
session_start();
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

if(isset($_SESSION['SESS_ADMIN_USERNAME'])){
session_destroy();
header('location:index.php');
}
if(isset($_SESSION['SESS_FIRST_NAME'])){
mysql_query("DELETE FROM logged_in_users WHERE username='".$_SESSION['SESS_USERNAME']."'");
session_destroy();
header('location:index.php');
}
else {
header('location: index.php');
}
mysql_close();
?>