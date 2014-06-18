function getImageInfo(){
	var selectedImage = $("#selectImg").val();
	$.ajax("imageServer.php", {type: "POST", data: {"testID": "1", "questionNum": selectedImage},
		success: function(inputData) {
			var imageData = JSON.parse(inputData);
			var tileSize = imageData["tileSize"];
			var numOfTiles = imageData["numOfTiles"];
			var cssFile = imageData["cssFile"];
			var styleFile = document.createElement("style");
	       	styleFile.setAttribute("type", "text/css");
	       	var importedText = document.createTextNode("@import url('" + cssFile + "');");
	       	styleFile.appendChild(importedText);
	       	document.getElementsByTagName("head")[0].appendChild(styleFile);
			var imageHolder = document.createElement("div");
			imageHolder.className = "IExamImageHolder";
			for (var tiles = 0; tiles < numOfTiles; tiles++) {
				currentTile = document.createElement("div");
				currentTile.className = "IExamImageTile";
				currentTile.id = "IExamImageTile" + tiles;
				imageHolder.appendChild(currentTile);
			};
			$("#imageSystem").empty();
			$("#imageSystem").append(imageHolder);
		}
	});
}

//$(document).ready(function(){
