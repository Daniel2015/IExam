<?php
$query = mysql_query("SELECT description, id FROM tests WHERE has_images='0'");
$num = mysql_num_rows($query);

$i=0;
if(isset($_POST['test_id']))
{
$test_id = $_POST['test_id'];
header("location:test?testId=$test_id");
}
?>
	<div class="panel panel-success">
	<div class="panel-heading">
		
		<span><h4 style="display: inline;">Тестове</h4></span>
	</div>
	<div class="panel-body">
	
<?php
while($i < $num)
{
$result = mysql_result($query, $i, 'description');
$resultID = mysql_result($query, $i, 'id');
?>
<form name="test_id" method="POST" action="">
<button type="submit" class="btn btn-info" name="test_id" value="<?php echo $resultID; ?>" /><?php echo $result; ?> </button>
</form>
<br>
<?php
$i++;}
?>
	</div>
</div>
