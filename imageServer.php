<?php
	session_start();

	require_once("utilities/SecurityManager.php");
	$securityManager = new SecurityManager;
	$securityManager->escapeAll();

	require_once('permissions.php');
	Permissions::OnlyAuthenticated();

	require_once('connection.php');
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
	
	$testID = $_POST['testID'];
	$questionNum = $_POST['questionNum'];

	$queryMap="SELECT has_image, image_id 
		FROM map_tests_questions 
		WHERE test_id=".$testID." && question_number=".$questionNum;
	$mapRes = mysql_query($queryMap);
	$mapping = mysql_fetch_assoc($mapRes);

	if($mapping['has_image']==1){

		$queryTest = "SELECT image_tile_size FROM tests 
			WHERE id=".$testID;
		$testRes = mysql_query($queryTest);
		$tileSize = mysql_fetch_row($testRes)[0];

		$queryImage="SELECT number_of_tiles, css_file FROM test_images 
			WHERE id=".$mapping['image_id'];
		$imgRes = mysql_query($queryImage);
		$imageInfo = mysql_fetch_assoc($imgRes);

		$imageData = array(
			"tileSize" => $tileSize,
			"numOfTiles" => $imageInfo['number_of_tiles'],
			"cssFile" => $imageInfo['css_file']
		);

		echo json_encode($imageData);
	}

	mysql_close();
?>
