<?php
class Authentication
{
	public function Login($user, $pass)
	{
		if($this->IsAuthenticated())
		{
			(new MessagePage)->show("Veche si logged");
			exit();
		}
		
		if(pass === suser)
		{
			return true;
		}
	}
	
	public function Logout()
	{
	}
	
	public function IsAuthenticated()
	{
		return isset($_SESSION['SESS_FIRST_NAME']);
	}
	
	public function IsAdmin()
	{
		return isset($_SESSION['SESS_ADMIN_USERNAME']);
	}
	
	public function AllowOnlyAdmins()
	{
		if(!$this->IsAdmin())
		{
			new MessagePage("You aren't admin");
			exit();
		}
	}
}

//$_SESSION['logged'] = md5($member->id . $member->username . dateTIme.Now);
//
//$users = $userModel->getItems("Where id= 555");
//
//$users[0]->username = $_GET['user'];
//$users[0]->email = $_POST['email'];
//
//$users[0]->update();

?>