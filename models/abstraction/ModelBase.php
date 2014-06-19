<?php
	require_once("IModel.php");

	abstract class ModelBase implements IModel
	{
		private $tableName = "";
		
		protected $fieldsMapping;
		
		protected $selectQuery = "Select * from ";
		
		public function set_selectQuery($query)
		{
			$this->selectQuery = $query;
		}
		
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
			
			$queryResult = mysql_query($this->selectQuery . $this->get_tableName() . " " . $query);
			
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
		
		private function bindData($row)
		{
			$currentModelName = get_class($this);
			$model = new $currentModelName;
			
			foreach ($this->fieldsMapping as $fieldName => $dbFiledName) {
				if(isset($row[$dbFiledName]))
				{
					$model->$fieldName = $row[$dbFiledName];
				}
			}
			
			return $model;
		}
		
		abstract public function insert();
		
		abstract public function update();
	}
?>