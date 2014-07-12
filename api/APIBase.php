<?php
session_start();

require_once('../connection.php');
require_once('../utilities/SecurityManager.php');
require_once('permissions.php');

$action = $_GET['action'];

header('Content-Type: application/json; charset=UTF-8' );
echo json_encode($action());
?>