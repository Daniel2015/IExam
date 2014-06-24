<!DOCTYPE html>
<?php
	Permissions::OnlyAuthenticated();
	
	$logged = $_SESSION['SESS_USERNAME'];
	$results = mysql_query("SELECT isAdmin FROM simple_login WHERE username='$logged'");
	$isAdmin = mysql_result($results, 0, "isAdmin");
	
	if($isAdmin == 0)
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
				// $query = "SELECT * FROM messages WHERE fromUser IN ('$logged', '" . 'Админ (' . $logged . ')' . "') AND deleted='0'" ;
			}
		}
		$result=mysql_query($query);
		$num=mysql_num_rows($result);
		if(isset($_POST['submit']))
		{
			$ID = $_POST['submit'];
			mysql_query("Update messages SET readed='1' WHERE ID='$ID'");
			reloadReaded();
		}

		if(isset($_POST['delete'])){
			$ID = $_POST['delete'];
			mysql_query("Update messages SET deleted='1' WHERE ID='$ID'");
			mysql_query("DELETE FROM messages WHERE deleted='1' AND deletedAdmin='1' ");
			reloadDeleted();
		}
	}
	if($isAdmin == 1)
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
				$query = "SELECT * FROM messages WHERE fromUser IN ('$logged', '" . 'Админ (' . $logged . ')' . "') AND deletedAdmin='0'" ;
			}
		}

		$result=mysql_query($query);
		$num=mysql_num_rows($result);
		if(isset($_POST['submit']))
		{
			$ID = $_POST['submit'];
			mysql_query("Update messages SET readedAdmin='1' WHERE ID='$ID'");
			reloadReaded();
		}
		if(isset($_POST['delete']))
		{
			$ID = $_POST['delete'];
			mysql_query("Update messages SET deletedAdmin='1' WHERE ID='$ID'");
			mysql_query("DELETE FROM messages WHERE deleted='1' AND deletedAdmin='1' ");
			reloadDeleted();

		}
	}
	
function reloadReaded()
{			
			if(!isset($_GET['received']) && !isset($_GET['readedOnly']) && !isset($_GET['sent']))
			{
				header('location:mail');
			}		
			if(isset($_GET['received']) && $_GET['received'] == 0)
			{
				header('location:mail?received=0');
			}
			if(isset($_GET['received']) && $_GET['received'] == 1)
			{
				header('location:mail?received=1');
			}
			if(isset($_GET['readedOnly']) && $_GET['readedOnly'] == 1)
			{
				header('location:mail?readedOnly=1');
			}
			if(isset($_GET['sent']) && $_GET['sent'] == 0)
			{
				header('location:mail?sent=0');
			}
}

function reloadDeleted()
{
			if(!isset($_GET['received']) && !isset($_GET['readedOnly']) && !isset($_GET['sent']))
			{			
				(new MessagePage)->show("", "Съобщението e изтрито!", "danger","mail","800");		
			}
			if(isset($_GET['received']) && $_GET['received'] == 0)
			{			
				(new MessagePage)->show("", "Съобщението e изтрито!", "danger","mail?received=0","800");		
			}
			if(isset($_GET['received']) && $_GET['received'] == 1)
			{			
				(new MessagePage)->show("", "Съобщението e изтрито!", "danger","mail?received=1","800");		
			}
			if(isset($_GET['readedOnly']) && $_GET['readedOnly'] == 1)
			{			
				(new MessagePage)->show("", "Съобщението e изтрито!", "danger","mail?readedOnly=1","800");		
			}
			if(isset($_GET['sent']) && $_GET['sent'] == 0)
			{			
				(new MessagePage)->show("", "Съобщението e изтрито!", "danger","mail?sent=0","800");		
			}			
}
?>
<div class="panel panel-success">

					<div class="panel-heading">
						<span><h4 style="display: inline;">Поща</h4></span>
					</div>
					<div class="panel-body">
						<input type="button" class="btn btn-success" value="Изпрати" onClick="window.location.href='send'">
						<div class="btn-group">
						<input <?php if ((isset($_GET['received']) && $_GET['received'] == 0) || (!isset($_GET['received']) && !isset($_GET['readedOnly']) && !isset($_GET['sent']))){ echo "disabled"; } ?> type="button" class="btn btn-primary" value="Входящи" onClick="window.location.href='?received=0'">
						<input <?php if (isset($_GET['received']) && $_GET['received'] == 1){ echo "disabled"; } ?> type="button" class="btn btn-info" value="Непрочетени" onClick="window.location.href='?received=1'">
						<input <?php if (isset($_GET['readedOnly']) && $_GET['readedOnly'] == 1){ echo "disabled"; } ?> type="button" class="btn btn-info" value="Прочетени" onClick="window.location.href='?readedOnly=1'">
						</div>
						<input <?php if (isset($_GET['sent']) && $_GET['sent'] == 0){ echo "disabled"; } ?> type="button" class="btn btn-primary" value="Изходящи" onClick="window.location.href='?sent=0'">
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
						$field0=mysql_result($result,$num-1,"fromUser");
						if (strpos ($field0,'Админ (') !== false)
						{
						$field0 = '*Админ*';
						}
						$field1=mysql_result($result,$num-1,"toUser");
						$field2=mysql_result($result,$num-1,"message");
						$field3=mysql_result($result,$num-1,"dateCreated");
						$field4=mysql_result($result,$num-1,"ID");
					?>
<tr class="success table-hover" >
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

<form  name="login" onsubmit="" method="POST" action="" >
<button type="submit" name="submit" class="form-control btn btn-warning" value="<?php echo $field4; ?>"/>Прочетено</button>
</form>
<?php } ?>
<form name="login" onsubmit="" method="POST" action="" >
<button type="submit" name="delete" class="form-control btn btn-danger" onclick="" value="<?php echo $field4; ?>"/>Изтрий</button>
</form>
</td>
</tr>
<?php
$num--;}
?>
</table>
</div>