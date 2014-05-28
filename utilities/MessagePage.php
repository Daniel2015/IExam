<?php
class MessagePage
{
	public static function show($message, $title, $redirectTo, $timeout = 1800)
	{
		//header('Location: /common pages/messagepage');
		include('/common pages/messagepage.php');
	}
}
?>