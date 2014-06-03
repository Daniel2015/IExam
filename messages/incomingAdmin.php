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

$query="SELECT * FROM messages WHERE toUser='".$_SESSION['SESS_ADMIN_USERNAME']."' AND readedAdmin='0' AND deletedAdmin='0'";
$result=mysql_query($query);
$num=mysql_numrows($result);

if(isset($_POST['submit'])){
$ID = $_POST['submit'];
mysql_query("Update messages SET readedAdmin='1' WHERE ID='$ID'");
header('location:incomingAdmin');
//(new MessagePage)->show("", "Съобщението e преместено", "warning","incomingAdmin","800");
mysql_close();
}

if(isset($_POST['delete'])){
$ID = $_POST['delete'];
mysql_query("Update messages SET deletedAdmin='1' WHERE ID='$ID'");
mysql_query("DELETE FROM messages WHERE deleted='1' AND deletedAdmin='1' ");
(new MessagePage)->show("", "Съобщението e изтрито!", "danger","incomingAdmin","800");
mysql_close();
}


?>
<div class="panel panel-success">

					<div class="panel-heading">
						<span><h4 style="display: inline;">Непрочетени</h4></span>
					</div>
					<div class="panel-body">
						<div class="btn-group">
						<a href="readedAdmin" class="btn btn-info" >Прочетени</a>
						<a href="../administration/mailAdmin" class="btn btn-info" >Назад</a>
						<a href="../logout" class="btn btn-info" >Излез</a>
						</div>
					</div>


<table class="table table-bordered table-hover table-condensed">
<tr class="active table-hover">
<td>
Изпратил
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
						$field1=mysql_result($result,$i,"fromUser");
						$field2=mysql_result($result,$i,"message");
						$field3=mysql_result($result,$i,"dateCreated");
						$field4=mysql_result($result,$i,"ID");
					?>
<tr class="success table-hover ">
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
<form name="login" onsubmit="" method="POST" action="" >
<button type="submit" name="submit" class="form-control btn btn-warning" onclick="" value="<?php echo $field4; ?>"/>Прочетено</button>
</form>
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