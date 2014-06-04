<?php
class SecurityManager
{
	public function escapeValue($value)
	{ 
		if ((int)$value) 
		{
			return $value; 
		}
		else 
		{ 
			$value = addslashes($value); 
			$value = htmlspecialchars($value, ENT_NOQUOTES); 

			return $value;
		} 
	}
	
	public function getRawValue($value)
	{
		return stripslashes(htmlspecialchars_decode($value, ENT_NOQUOTES));
	}
	
	public function escapeAll()
	{
		$_GET = array_map(array($this, "escapeValue"), $_GET); 
		$_POST = array_map(array($this, "escapeValue"), $_POST); 
		$_SESSION = array_map(array($this, "escapeValue"), $_SESSION); 
		$_COOKIE = array_map(array($this, "escapeValue"), $_COOKIE); 
		$_SERVER = array_map(array($this, "escapeValue"), $_SERVER); 
	}
}
?>