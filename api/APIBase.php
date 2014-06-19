<?php
session_start();

require_once('../connection.php');
require_once('../utilities/SecurityManager.php');
require_once('permissions.php');

$action = $_GET['action'];

header('Content-type: application/json');
echo json_encode($action());
?>