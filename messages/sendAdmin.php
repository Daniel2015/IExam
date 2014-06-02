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
	if(!isset($_POST['who']))
	{
	$user = $_POST['user'];
	$message = $_POST['message'];
	$time = date("Y-m-d H:i:s");
	mysql_query("INSERT INTO messages (fromUser, toUser, message, dateCreated)VALUES('".$_SESSION['SESS_ADMIN_USERNAME']."', '$user', '$message', '$time')");
	MessagePage::show("", "Съобщението е изпратено!", "success");
	mysql_close();
	}
	if(isset($_POST['who']))
	{
	$user = $_POST['user'];
	$message = $_POST['message'];
	$time = date("Y-m-d H:i:s");
	mysql_query("INSERT INTO messages (fromUser, toUser, message, dateCreated)VALUES('Админ', '$user', '$message', '$time')");
	MessagePage::show("", "Съобщението е изпратено!", "success");
	mysql_close();
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

<div class="col-md-13">
	<div class="panel panel-default">
<div class="panel-body">
<form class="form-horizontal" role="form" method="POST" action="">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Потребител</label>
    <div class="col-sm-10">
      <select class="dropdown input-lg form-control" name="user" id="user">
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
      <input name="message" type="text" class="form-control input-lg" id="inputPassword3" placeholder="Съобщение">
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
    </div>
  </div>
  <p><a href="../administration/mailAdmin" class="btn btn-info" >Назад</a></p>
  <p><a href="../logout" class="btn btn-info" >Излез</a></p>
</form>
</div>
</div>
</div>
</body>
</html>