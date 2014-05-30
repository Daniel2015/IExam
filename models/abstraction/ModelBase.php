<?php
	require_once("models/abstraction/IModel.php");

	abstract class ModelBase implements IModel
	{
		private $tableName = "";
		
		public function get_tableName()
		{
			if(isset($tableName))
			{
				throw new LogicException(get_class($this) . ' must have a $tableName');
			}
			
			return $this->tableName;
		}
		
		protected function set_tableName($table)
		{
			if(isset($tableName))
			{
				throw new LogicException(get_class($this) . ' must have a $tableName');
			}
			
			$this->tableName = $table;
		}	
		
		public function getItems($query = "")
		{
			$queryResult;
			
			$queryResult = mysql_query("Select * from " . $this->get_tableName() . $query);
			
			if(!$queryResult)
			{
				die('Invalid query [' . get_class($this) . ']: ' . mysql_error());
			}
			
			$result = [];
			while ($row = mysql_fetch_array($queryResult, MYSQL_ASSOC))
			{
				$result[] = $this->bindData($row);
			}
			
			return $result;
		}
		
		abstract protected function bindData($row);
		
		abstract public function insert();
		
		abstract public function update();
	}
?>