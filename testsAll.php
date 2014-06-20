<?php
$query = mysql_query("SELECT description, id FROM tests WHERE has_images='0'");
$num = mysql_num_rows($query);

$i=0;
if(isset($_POST['test_id']))
{
$test_id = $_POST['test_id'];
header("location:test?testId=$test_id");
}
if(isset($_POST['submit']))
{
$test_id = $_POST['submit'];
header("location:administration/create_test?testId=$test_id");
}
if(isset($_POST['delete']))
{
$test_id = $_POST['delete'];
mysql_query("DELETE FROM tests WHERE id='$test_id'");
header('location:testsAll');
}
?>
	<div class="panel panel-success">
	<div class="panel-heading">
		
		<span><h4 style="display: inline;">Тестове</h4></span>
	</div>
	<div class="panel-body">
<div class="btn-group">
<table class="table table-bordered table-hover table-condensed">
<tr class="active table-hover">
<td>
Име на тест
</td>
<?php
if(isset($_SESSION['SESS_FIRST_NAME']))
{
	if(Authentication::IsAdmin())
	{
?>
<td>
Редактирай
</td>
<?php } } ?>
</tr>
<tr class=" table-hover" >
<?php
while($i < $num)
{
$result = mysql_result($query, $i, 'description');
$resultID = mysql_result($query, $i, 'id');
?>
<td>
<form name="test_id" method="POST" action="">
<button type="submit" class="btn btn-info" name="test_id" value="<?php echo $resultID; ?>" /><?php echo $result; ?> </button>
</form>
</td>
<?php
if(isset($_SESSION['SESS_FIRST_NAME']))
{
	if(Authentication::IsAdmin())
	{
?>
<td>

<form action="" name="submit" method="POST">
<button type="submit" name="submit" class="btn btn-warning" value="<?php echo $resultID; ?>" >Редактирай</button>
</form>

</td>
<?php } } ?>
</tr>
<?php
 $i++; }
?>
</table>
</div>
	</div>
</div>
