<!DOCTYPE html>
<?php
	//Permissions::OnlyAuthenticated();

	$logged = $_SESSION['SESS_USERNAME'];
	$results = mysql_query("SELECT isAdmin FROM simple_login WHERE username='$logged'");
	$his = mysql_result($results, 0, "isAdmin");
	
	if($his == 0)
	{

		$query = "SELECT * FROM messages WHERE ";

		if(!isset($_GET['received']) && !isset($_GET['readedOnly']) && !isset($_GET['sent']))
		{
			$query = $query . "toUser = '" . $logged . "' AND deleted = '0' ";
		}
		else
		{
			if(isset($_GET['received']) && $_GET['received'] == 0) // Received messages
			{
				$query = $query . "toUser = '" . $logged . "' AND deleted = '0' ";
			}
			if(isset($_GET['received']) && $_GET['received'] == 1) // Unreaded messages
			{
				$query = $query . "toUser = '" . $logged . "' AND readed = '0' AND deleted = '0' ";
			}
			if(isset($_GET['readedOnly']) && $_GET['readedOnly'] == 1) // Readed messages
			{
				$query = $query . "toUser = '" . $logged . "' AND readed = '1' AND deleted = '0' ";
			}
			if(isset($_GET['sent']) && $_GET['sent'] == 0) // Outgoing messages
			{
				$query = $query . "fromUser = '" . $logged . "' AND deleted='0' ";
			}
		}
		$result=mysql_query($query);
		$num=mysql_numrows($result);
		if(isset($_POST['submit']))
		{
			$ID = $_POST['submit'];
			mysql_query("Update messages SET readed='1' WHERE ID='$ID'");
			if(!isset($_GET['received']) && !isset($_GET['readedOnly']) && !isset($_GET['sent']))
			{
				header('location:refactored');
			}		
			if(isset($_GET['received']) && $_GET['received'] == 0)
			{
				header('location:refactored?received=0');
			}
			if(isset($_GET['received']) && $_GET['received'] == 1)
			{
				header('location:refactored?received=1');
			}
			if(isset($_GET['readedOnly']) && $_GET['readedOnly'] == 1)
			{
				header('location:refactored?readedOnly=1');
			}
			if(isset($_GET['sent']) && $_GET['sent'] == 0)
			{
				header('location:refactored?sent=0');
			}
			mysql_close();
		}

		if(isset($_POST['delete'])){
			$ID = $_POST['delete'];
			mysql_query("Update messages SET deleted='1' WHERE ID='$ID'");
			mysql_query("DELETE FROM messages WHERE deleted='1' AND deletedAdmin='1' ");
			if(!isset($_GET['received']) && !isset($_GET['readedOnly']) && !isset($_GET['sent']))
			{			
			(new MessagePage)->show("", "Съобщението e изтрито!", "danger","refactored","800");		
			}
			if(isset($_GET['received']) && $_GET['received'] == 0)
			{			
			(new MessagePage)->show("", "Съобщението e изтрито!", "danger","refactored?received=0","800");		
			}
			if(isset($_GET['received']) && $_GET['received'] == 1)
			{			
			(new MessagePage)->show("", "Съобщението e изтрито!", "danger","refactored?received=1","800");		
			}
			if(isset($_GET['readedOnly']) && $_GET['readedOnly'] == 1)
			{			
			(new MessagePage)->show("", "Съобщението e изтрито!", "danger","refactored?readedOnly=1","800");		
			}
			if(isset($_GET['sent']) && $_GET['sent'] == 0)
			{			
			(new MessagePage)->show("", "Съобщението e изтрито!", "danger","refactored?sent=0","800");		
			}	
			mysql_close();
		}
	}
	else
	{
		$query = "SELECT * FROM messages WHERE ";
		if(!isset($_GET['received']) && !isset($_GET['readedOnly']) && !isset($_GET['sent']))
		{
			$query = $query . "toUser = '" . $logged . "' AND deletedAdmin = '0' ";
		}
		else
		{		
			if(isset($_GET['received']) && $_GET['received'] == 0) // Received messages
			{
				$query = $query . "toUser = '" . $logged . "' AND deletedAdmin = '0' ";
			}
			if(isset($_GET['received']) && $_GET['received'] == 1) // Unreaded messages
			{
				$query = $query . "toUser = '" . $logged . "' AND readedAdmin = '0' AND deletedAdmin = '0' ";
			}
			if(isset($_GET['readedOnly']) && $_GET['readedOnly'] == 1) // Readed messages
			{
				$query = $query . "toUser = '" . $logged . "' AND readedAdmin = '1' AND deletedAdmin = '0' ";
			}
			if(isset($_GET['sent']) && $_GET['sent'] == 0) // Outgoing messages
			{
				$query = $query . "fromUser = '" . $logged . "' AND deletedAdmin='0' ";
			}
		}

		$result=mysql_query($query);
		$num=mysql_numrows($result);
		if(isset($_POST['submit']))
		{
			$ID = $_POST['submit'];
			mysql_query("Update messages SET readedAdmin='1' WHERE ID='$ID'");
			if(!isset($_GET['received']) && !isset($_GET['readedOnly']) && !isset($_GET['sent']))
			{
				header('location:refactored');
			}		
			if(isset($_GET['received']) && $_GET['received'] == 0)
			{
				header('location:refactored?received=0');
			}
			if(isset($_GET['received']) && $_GET['received'] == 1)
			{
				header('location:refactored?received=1');
			}
			if(isset($_GET['readedOnly']) && $_GET['readedOnly'] == 1)
			{
				header('location:refactored?readedOnly=1');
			}
			if(isset($_GET['sent']) && $_GET['sent'] == 0)
			{
				header('location:refactored?sent=0');
			}
			mysql_close();
		}
		if(isset($_POST['delete']))
		{
			$ID = $_POST['delete'];
			mysql_query("Update messages SET deletedAdmin='1' WHERE ID='$ID'");
			mysql_query("DELETE FROM messages WHERE deleted='1' AND deletedAdmin='1' ");
			if(!isset($_GET['received']) && !isset($_GET['readedOnly']) && !isset($_GET['sent']))
			{			
			(new MessagePage)->show("", "Съобщението e изтрито!", "danger","refactored","800");		
			}
			if(isset($_GET['received']) && $_GET['received'] == 0)
			{			
			(new MessagePage)->show("", "Съобщението e изтрито!", "danger","refactored?received=0","800");		
			}
			if(isset($_GET['received']) && $_GET['received'] == 1)
			{			
			(new MessagePage)->show("", "Съобщението e изтрито!", "danger","refactored?received=1","800");		
			}
			if(isset($_GET['readedOnly']) && $_GET['readedOnly'] == 1)
			{			
			(new MessagePage)->show("", "Съобщението e изтрито!", "danger","refactored?readedOnly=1","800");		
			}
			if(isset($_GET['sent']) && $_GET['sent'] == 0)
			{			
			(new MessagePage)->show("", "Съобщението e изтрито!", "danger","refactored?sent=0","800");		
			}			
			mysql_close();
		}
	}
?>
<div class="panel panel-success">

					<div class="panel-heading">
						<span><h4 style="display: inline;">Поща</h4></span>
					</div>
					<div class="panel-body">
						<a href="send" class="btn btn-success" >Изпрати</a>
						<div class="btn-group">
						
				<!--		<select class="btn btn-default selectpicker" onchange="window.location.href=this.value;">
						<option value="?received=0">Входящи</option>
						<option value="?received=1">Непрочетени</option>
						<option value="?readedOnly=1">Прочетени</option>
						</select>													-->
						
						<a href="?received=0" class="btn btn-primary" >Входящи</a>
						<a href="?received=1" class="btn btn-info" >Непрочетени</a>
						<a href="?readedOnly=1" class="btn btn-info" >Прочетени</a>  
						<a href="?sent=0" class="btn btn-primary" >Изходящи</a>
						</div>
						<?php if($his == 0) { ?>
						<a href="../main_login" class="btn btn-warning">Назад</a>
						<?php } ?>
						<?php if($his == 1) { ?>
						<a href="../administration/admin" class="btn btn-warning">Назад</a>
						<?php } ?>
					</div>


<table class="table table-bordered table-hover table-condensed">
<tr class="active table-hover">
<td>
Изпратил
</td>
<td>
Получател
</td>
<td>
Съобщениe
</td>
<td>
Дата
</td>
<td>
Операции
</td>
</tr>
<?php
					$i=0;
					while ($i < $num) {
						$field0=mysql_result($result,$i,"fromUser");
						$field1=mysql_result($result,$i,"toUser");
						$field2=htmlspecialchars(mysql_result($result,$i,"message"));
						$field3=mysql_result($result,$i,"dateCreated");
						$field4=mysql_result($result,$i,"ID");
					?>
<tr class="success table-hover ">
<td>
<?php echo $field0; ?>
</td>
<td>
<?php echo $field1; ?>
</td>
<td>
<?php echo $field2; ?>
</td>
<td>
<?php echo $field3; ?>
</td>
<td>
<?php
if((isset($_GET['received']) && $_GET['received'] == 1) || (isset($_GET['received']) && $_GET['received'] == 0) || (!isset($_GET['received']) && !isset($_GET['readedOnly']) && !isset($_GET['sent'])) ) { ?>

<form name="login" onsubmit="" method="POST" action="" >
<button type="submit" name="submit" class="form-control btn btn-warning" onclick="" value="<?php echo $field4; ?>"/>Прочетено</button>
</form>

<?php } ?>
<form name="login" onsubmit="" method="POST" action="" >
<button type="submit" name="delete" class="form-control btn btn-danger" onclick="" value="<?php echo $field4; ?>"/>Изтрий</button>
</form>
</td>
</tr>
<?php
$i++;}
?>
</table>
</div>