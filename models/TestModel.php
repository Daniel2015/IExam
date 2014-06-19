<?php
	require_once("abstraction/ModelBase.php");

	class TestModel extends ModelBase
	{	
		public $id;
		
		public $description;
		
		public $hasImages;
		
		public $imageTileSize;
		
		public $imageFileNames;
		
		public function __construct()
		{
			$this->set_tableName("tests");
			
			$this->fieldsMapping = array(
				'id' => 'id',
				'description' => 'description',
				'hasImages' => 'has_images',
				'imageTileSize' => 'image_tile_size',
				'imageFileNames' => 'image_filenames',
			);
		}
		
		public function insert()
		{
			return mysql_query("INSERT INTO tests
			VALUES ('', '$this->description', '$this->hasImages', '$this->imageTileSize', '$this->imageFileNames')" );
		}		
		
		public function update()
		{
			// TODO
		}	
	}
?>