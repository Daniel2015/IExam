<!DOCTYPE html>
<?php
	$logged = $_SESSION['SESS_USERNAME'];
	$results = mysql_query("SELECT isAdmin FROM simple_login WHERE username='$logged'");
	$isAdmin = mysql_result($results, 0, "isAdmin");
	
	if($isAdmin == 1)
	{
	$query="SELECT * FROM simple_login WHERE isAdmin='0' ORDER BY username";
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
			mysql_query("INSERT INTO messages (fromUser, toUser, message, dateCreated)VALUES('$logged', '$user', '$message', '$time')");
			MessagePage::show("", "Съобщението е изпратено!", "success", "mail?sent=0");
			exit();
			mysql_close();
		}
		if(isset($_POST['who']))
		{
			$user = $_POST['user'];
			$message = $_POST['message'];
			$time = date("Y-m-d H:i:s");
			mysql_query("INSERT INTO messages (fromUser, toUser, message, dateCreated)VALUES('" . 'Админ (' . $logged . ')' . "', '$user', '$message', '$time')");
			MessagePage::show("", "Съобщението е изпратено!", "success", "mail?sent=0");
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
if($isAdmin == 0)
{
$query="SELECT * FROM simple_login WHERE isAdmin='1' ORDER BY username";
	$result=mysql_query($query);
	$num=mysql_numrows($result);
	
if(isset($_POST['submit']))
{
	if(!empty($_POST['message']) && !empty($_POST['user'])){
	
	$user = $_POST['user'];
	$message = $_POST['message'];
	$time = date("Y-m-d H:i:s");
	mysql_query("INSERT INTO messages (fromUser, toUser, message, dateCreated)VALUES('$logged', '$user', '$message', '$time')");
	MessagePage::show("", "Съобщението е изпратено!", "success","mail?sent=0");
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
else{
echo mysql_error();
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
<input type="button" class="btn btn-success" value="Изпрати" onClick="window.location.href='send'" disabled>
<div class="btn-group">
						
						<a href="mail?received=0" class="btn btn-primary" >Входящи</a>
						<a href="mail?received=1" class="btn btn-info" >Непрочетени</a>
						<a href="mail?readedOnly=1" class="btn btn-info" >Прочетени</a> 
						</div>
						<a href="mail?sent=0" class="btn btn-primary" >Изходящи</a>
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
if($isAdmin == 1){ ?>
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
    </div>
  </div>
</form>


</div>
</body>
</html>