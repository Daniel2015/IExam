<!DOCTYPE html>
<?php
	$logged = $_SESSION['SESS_USERNAME'];
	$results = mysql_query("SELECT isAdmin FROM simple_login WHERE username='$logged'");
	$his = mysql_result($results, 0, "isAdmin");
	
	if($his == 1)
	{
	$query="SELECT * FROM simple_login WHERE isAdmin='0'";
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
			// $message = mysql_real_escape_string($message);
			mysql_query("INSERT INTO messages (fromUser, toUser, message, dateCreated)VALUES('$logged', '$user', '$message', '$time')");
			MessagePage::show("", "Съобщението е изпратено!", "success", "refactored");
			exit();
			mysql_close();
		}
		if(isset($_POST['who']))
		{
			$user = $_POST['user'];
			$message = $_POST['message'];
			$time = date("Y-m-d H:i:s");
			// $message = mysql_real_escape_string($message);
			mysql_query("INSERT INTO messages (fromUser, toUser, message, dateCreated)VALUES('Админ', '$user', '$message', '$time')");
			MessagePage::show("", "Съобщението е изпратено!", "success", "refactored");
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
}
else
{
$query="SELECT * FROM simple_login WHERE isAdmin='1'";
	$result=mysql_query($query);
	$num=mysql_numrows($result);
	
if(isset($_POST['submit']))
{
	if(!empty($_POST['message']) && !empty($_POST['user'])){
	
	$user = $_POST['user'];
	$message = $_POST['message'];
	$time = date("Y-m-d H:i:s");
	// $message = mysql_real_escape_string($message);
	mysql_query("INSERT INTO messages (fromUser, toUser, message, dateCreated)VALUES('$logged', '$user', '$message', '$time')");
	MessagePage::show("", "Съобщението е изпратено!", "success","refactored");
	exit();
	mysql_close();
	}
	else{
	MessagePage::show("Моля, попълнете полето.", "Съобщението е празно!", "danger");
	}
}
else
{
echo mysql_error();
}
}
?>		
			
<html>
<head>
</head>
<body>	
<div class="panel panel-success">
<div class="panel-heading">
<span><h4 style="display: inline;">Поща</h4></span>
</div>

<div class="panel-body">
<a href="send" class="btn btn-success disabled" >Изпрати</a>
<div class="btn-group">
						
						<a href="refactored?received=0" class="btn btn-primary" >Входящи</a>
						<a href="refactored?received=1" class="btn btn-info" >Непрочетени</a>
						<a href="refactored?readedOnly=1" class="btn btn-info" >Прочетени</a>  
						<a href="refactored?sent=0" class="btn btn-primary" >Изходящи</a>
						</div>
						<?php if($his == 0) { ?>
						<a href="../main_login" class="btn btn-warning">Назад</a>
						<?php } ?>
						<?php if($his == 1) { ?>
						<a href="../administration/admin" class="btn btn-warning">Назад</a>
						<?php } ?>
</div>
<form class="form-horizontal" role="form" method="POST" action="">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Потребител</label>
    <div class="col-sm-10">
      <select class="dropdown input-lg form-control" name="user" id="user">
					<option value="" >Изберете Потребител</option>
					<option disabled="disabled"></option>
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
<?php
if($his == 1){ ?>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input name="who" type="checkbox" value="1"> Анонимно <i>(Админ)</i>
        </label>
      </div>
    </div>
  </div>
<?php  }
 ?>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
		<input type="submit" name="submit" class="btn btn-success btn-lg" value="Изпрати" />
		<a href="../messages/refactored" class="btn btn-info btn-lg" >Назад</a>
    </div>
  </div>
</form>


</div>
</body>
</html>