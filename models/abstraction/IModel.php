<?php
	interface IModel
	{
		public function get_tableName();
		
		public function getItems($query = null);
		
		public function insert();
		
		public function update();
	}
?>