<?php
	$TILE_SIZE = 10;
	$IMG_IN_PATH = "images/inputImages/";
	$CSS_PATH = "css/imageCSS/";
	$IMG_OUT_PATH = "images/outputImages/";

	function randomString($length) {
		$chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    	$result = "";
    	for ($i = $length; $i > 0; --$i) {
    		$result .= substr($chars, rand (0, (strlen($chars)-1)), 1);
    	}
    	return $result;
    }
	
	echo "Run ID: ".randomString(30)."<br/>";

	//hardcoded test
	//$imgFiles = array ("test30x30.png",
	//	"chovka.png", "koliba.jpg", "nos.jpg", "cveke.png", "badHeightNos.jpg", "badWidthNos.jpg", "badFormatNos.bmp"
	//	);
	$imgFiles = array ('test30x30.png',
		'chovka.png', 'koliba.jpg', 'nos.jpg', 'cveke.png', 'badHeightNos.jpg', 'badWidthNos.jpg', 'badFormatNos.bmp'
		);
	$validImgFiles = array ();
	$imgTileSize = array ();
	$numOfTiles = 0;

	//Get images size and validate they are of correct type and size
	foreach ($imgFiles as $imgKey => $img) {
		$imgInfo = getimagesize ($IMG_IN_PATH.$img);
		if($imgInfo[0] % $TILE_SIZE != 0 || $imgInfo[1] % $TILE_SIZE != 0){
			//TODO: real errors
			echo "Error! Bad image size of image ".$img;
			echo "<br>";
			continue;
		}
		if($imgInfo[2] != IMAGETYPE_JPEG && $imgInfo[2] != IMAGETYPE_PNG){
			//TODO: real errors
			echo "Error! Bad image format of image ".$img;
			echo "<br>";
			continue;
		}
		array_push($validImgFiles, $img);
		$imgTiles = $imgInfo[0]/$TILE_SIZE * $imgInfo[1]/$TILE_SIZE;
		$imgTileSize[$imgKey] = $imgTiles;
		$numOfTiles+=$imgTiles;
		echo "Tiles for ".$img.": ".$imgTiles."<br>";
	}

	//TODO: uncomment
	//$outputImageName = randomString(30);
	$outputImageName = "output";
	echo "<a href='".$IMG_OUT_PATH.$outputImageName.".png' target='_blank'>Output image</a><br/>";

	$finSideTiles = sqrt ($numOfTiles);
	//if not integer
	if($finSideTiles != floor ($finSideTiles)){
		$finSideTiles = floor ($finSideTiles) + 1;
	}
	//TODO: some random tiles
	$finalImage = imagecreatetruecolor($finSideTiles*$TILE_SIZE, $finSideTiles*$TILE_SIZE);
	//update it to hold real value
	$numOfTiles = $finSideTiles * $finSideTiles;
	$tilesPopulated;
	for ($i=0; $i < $numOfTiles; $i++) { 
		$tilesPopulated[$i]=0;
	}

	//Slice images and put their tiles in random free tile spots in the final image
	foreach ($validImgFiles as $imgKey => $img) {
		$imgInfo = getimagesize ($IMG_IN_PATH.$img);
		$thisImg;
		switch ($imgInfo[2]) {
			case IMAGETYPE_JPEG:
				$thisImg = imagecreatefromjpeg($IMG_IN_PATH.$img);
				break;

			case IMAGETYPE_PNG:
				$thisImg = imagecreatefrompng($IMG_IN_PATH.$img);
				break;
		}

		$cssContents = ".IExamImageHolder{display: block !important; margin-left: auto !important; margin-right: auto !important; padding: 0 !important; width: ".$imgInfo[0]."px !important; height: ".$imgInfo[1]."px !important; border: 0 !important; font-size: 0 !important;}";

		$cssContents .= ".IExamImageTile{display: inline-block !important; margin: 0 !important; padding: 0 !important; width: ".$TILE_SIZE."px !important; height: ".$TILE_SIZE."px !important; border: 0 !important; background: url('".$IMG_OUT_PATH.$outputImageName.".png') !important;}";

		$imgNumTiles = ($imgTileSize[$imgKey]);
		for ($imgTile = 0; $imgTile < $imgNumTiles; $imgTile++) {
			//echo "imgTile: ".$imgTile." -> ";
			//get pseudo random free position
			$finTile = rand (0, $numOfTiles-1);
			while($tilesPopulated[$finTile]!=0){
				$finTile++;
				$finTile%=$numOfTiles;
			}
			$tilesPopulated[$finTile]=1;

			//echo "finTile: ".$finTile."<br>";

			$finStartingX = ($finTile%$finSideTiles) * $TILE_SIZE;
			//echo "finStartingX : ".$finStartingX;
			$finStartingY = floor($finTile/$finSideTiles) * $TILE_SIZE;
			//echo "; finStartingY : ".$finStartingY;
			$imgStartingX = ($imgTile*$TILE_SIZE) % $imgInfo[0];
			//echo "; imgStartingX : ".$imgStartingX;
			$imgStartingY = floor(($imgTile*$TILE_SIZE) / $imgInfo[0]) * $TILE_SIZE;
			//echo "; imgStartingY : ".$imgStartingY."<br>";
			imagecopy($finalImage, $thisImg, $finStartingX, $finStartingY, $imgStartingX, $imgStartingY,
			 	$TILE_SIZE, $TILE_SIZE);

			$cssContents .="#IExamImageTile".$imgTile."{background-position: ".-$finStartingX."px ".-$finStartingY."px !important;}";
		}

		$cssFileName = $CSS_PATH;
		$cssFileName.= "image".$imgKey;
		//TODO: uncomment
		//$cssFileName.= randomString(25);
		$cssFileName.=".css";

		echo "<a href='".$cssFileName."' target='_blank'>CSS".$imgKey."</a><br/>";

		file_put_contents($cssFileName, $cssContents, LOCK_EX);

		imagedestroy($thisImg);
	}

	//header('Content-Type: image/png');
	imagepng($finalImage, $IMG_OUT_PATH.$outputImageName.".png");
	imagedestroy($finalImage);
?>