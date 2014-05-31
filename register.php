<?php
	require_once("models/UsersModel.php");

	if(isset($_POST['submit']))
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$ID=$_POST['ID'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		$user = new UsersModel;
		
		$user->firstName = $fname;
		$user->lastName = $lname;
		$user->fn = $ID;
		$user->username = $username;
		$user->password = $password;
		
		$result= $user->insert();
		if($result)
		{
			(new MessagePage)->show("", "Вие се регистрирахте успешно!", "success", "login");
			exit();
		} 
		else 
		{
			(new MessagePage)->show("Фак. Номер е зает", "Неуспешна регистрация!", "danger");
		}
	}
?>
	
<script type="text/javascript" charset="utf-8">
	function validateForm()
	{
		var a=document.forms["reg"]["fname"].value;
		var b=document.forms["reg"]["lname"].value;

		var c=document.forms["reg"]["ID"].value;
		var d=document.forms["reg"]["username"].value;
		var e=document.forms["reg"]["password"].value;
		
		if ((a==null || a=="") && (b==null || b=="") && (c==null || c=="") && (d==null || d=="") && (e==null || e==""))
		{
			alert("Всички полета трябва да са попълнени!");
			return false;
		}
		if (a==null || a=="")
		{
			alert("Моля, попълнете полето Име!");
			return false;
		}
		if (b==null || b=="")
		{
			alert("Моля, попълнете полето Фамилия!");
			return false;
		}
		  if (c==null || c=="")
		{
			alert("Моля, попълнете полето ЕГН!");
			return false;
		}
		if (d==null || d=="")
		{
		  alert("Моля, попълнете полето Фак. Номер!");
		  return false;
		}
		if (e==null || e=="")
		{
			alert("Моля, попълнете полето Парола!");
			return false;
		}
	}
</script>
<div class="col-md-4">
	<div class="panel panel-default">
	  <div class="panel-heading">
		<span><img src="images/secure.png" alt="some_text" width="21" height="21"><h4 style="display: inline;">Регистрация</h4></span>
	  </div>
	  <div class="panel-body">
		  <form name="reg" action="" onsubmit="return validateForm()" method="post" role="form" >
			  <div class="form-group">
				  <label>Име:</label>
				  <input class="form-control" type="text" name="fname" />
			  </div>
			  <div class="form-group">
				  <label>Фамилия:</label>
				  <input class="form-control" type="text" name="lname" />
			  </div>
			  <div class="form-group">
				  <label>ЕГН:</label>
				  <input class="form-control" type="text" name="ID" />
			  </div>
			  <div class="form-group">
				  <label>Фак. Номер:</label>
				  <input class="form-control" type="text" name="username" />
			  </div>
			  <div class="form-group">
				  <label>Парола:</label>
				  <input class="form-control" type="password" name="password" />
			  </div>
			  <input class="form-control btn btn-primary" name="submit" type="submit" value="Регистрирай се"/>
			  <a href="index" class="btn btn-info" >Назад</a>
		  </form>
	  </div>
	</div>
</div>