<!DOCTYPE html>
<?php
	if(!isset($_SESSION['log'])|| ($_SESSION['log'] != 'in'))
	{
		session_destroy();
		(new MessagePage)->show("", "Моля, влезте в системата!", "danger", "../login");
		  exit();
	}

	if(!isset($_SESSION['SESS_ADMIN_USERNAME']))
	{
		(new MessagePage)->show("", "Нямате достъп до тази страница!", "danger", "login");
		exit();
	}

	$query="SELECT * FROM simple_login";
	$result=mysql_query($query);
	$num=mysql_numrows($result);
if(isset($_POST['submit']))
{
	if(!empty($_POST['message']) && !empty($_POST['user']))
	{
		if(!isset($_POST['who']))
		{
			$user = $_POST['user'];
			$message = $_POST['message'];
			$time = date("Y-m-d H:i:s");
			mysql_query("INSERT INTO messages (fromUser, toUser, message, dateCreated)VALUES('".$_SESSION['SESS_ADMIN_USERNAME']."', '$user', '$message', '$time')");
			MessagePage::show("", "Съобщението е изпратено!", "success", "../administration/mailAdmin");
			exit();
			mysql_close();
		}
		if(isset($_POST['who']))
		{
			$user = $_POST['user'];
			$message = $_POST['message'];
			$time = date("Y-m-d H:i:s");
			mysql_query("INSERT INTO messages (fromUser, toUser, message, dateCreated)VALUES('Админ', '$user', '$message', '$time')");
			MessagePage::show("", "Съобщението е изпратено!", "success", "../administration/mailAdmin");
			exit();
			mysql_close();
		}
	}
	else{
	MessagePage::show("Моля, попълнете полето.", "Съобщението е празно!", "danger");
	}
}
else
{
echo mysql_error();
}
?>		
			
<html>
<head>
</head>
<body>	
<div class="panel panel-success">
<div class="panel-heading">
<span><h4 style="display: inline;">Напиши съобщение</h4></span>
</div>

<div class="panel-body">
<form class="form-horizontal" role="form" method="POST" action="">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Потребител</label>
    <div class="col-sm-10">
      <select class="dropdown input-lg form-control" name="user" id="user">
					<option value="" >Изберете Потребител</option>
					<?php $p=0;
							while ($p < $num) {
							$field=mysql_result($result,$p,"username");
							$p++;
					?>
					<option class="form-control" value="<?php echo $field; ?>"><?php echo $field; ?></option>
					<?php
					}
					?>
				</select> 
				
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Съобщение</label>
    <div class="col-sm-10">
      <textarea style="resize: none;" rows="10" name="message" type="text" class="form-control input-lg" maxlength="1000" id="inputPassword3" placeholder="Съобщение"></textarea>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input name="who" type="checkbox" value="1"> Анонимно <i>(Админ)</i>
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
		<input type="submit" name="submit" class="btn btn-success btn-lg" value="Изпрати" />
		<a href="../administration/mailAdmin" class="btn btn-info btn-lg" >Назад</a>
		<a href="../logout" class="btn btn-info btn-lg" >Излез</a>
    </div>
  </div>
</form>
</div>

</div>
</body>
</html>