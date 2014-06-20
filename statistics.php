<?php
if(!isset($_GET['test_id']))
{
$query = mysql_query("SELECT description, id FROM tests WHERE has_images='0'");
$num = mysql_num_rows($query);
$i=0;
 ?>
<div class="panel panel-success">
	<div class="panel-heading">		
		<span><h4 style="display: inline;">Статистика</h4></span>
	</div>
	<div class="panel-body">
<?php
while($i < $num)
{
$result = mysql_result($query, $i, 'description');
$resultID = mysql_result($query, $i, 'id');
?>
<form name="test_id" method="POST" action="">
<input type="button" class="btn btn-info" name="test_id" value="<?php echo $result; ?>" onClick="window.location.href='?test_id=<?php echo $resultID; ?>'">
</form>
<br>
<?php
$i++;}
?>	
</div>
</div>
<?php } if(isset($_GET['test_id'])){ $test_id = $_GET['test_id']; ?>
<div class="panel panel-success">
	<div class="panel-heading">		
		<span><h4 style="display: inline;">Статистика</h4></span>
	</div>
	<div class="panel-body">
	
	<div class="panel panel-info">
	<div class="panel-heading">		
		<span><h4 style="display: inline;"><?php echo mysql_result(mysql_query("SELECT description FROM tests WHERE id='$test_id'"), 0); ?></h4></span>
	</div>
	<div class="panel-body">
	
	<table class="table table-bordered table-hover table-condensed table-responsive">
	<tr class="active table-hover info">
		<td>Потребител</td>
		<td>Процент верни отговори</td>
	</tr>
<?php

	$questions_count = mysql_result(mysql_query("SELECT COUNT(test_id) FROM test_questions WHERE test_id='$test_id'"), 0);

	$query = mysql_query("SELECT username, description, COUNT(CASE WHEN answer = true_answer THEN 1 END)  as trueAnswers
		FROM test_questions as q 
		LEFT JOIN (SELECT * FROM `test_answers`) as a 
			ON q.question_id = a.question_id 
		LEFT JOIN (SELECT id, description FROM tests) as t
			ON q.test_id = t.id
		WHERE test_id='$test_id' GROUP BY username") or die(mysql_error());

	
	while ($row = mysql_fetch_array($query)) {
		echo '<tr class="active table-hover">
				<td>
				'.$row['username'].'
				</td>
				<td>
				'.round(($row['trueAnswers'] / $questions_count) * 100, 2) .'%
				</td>
				</tr>';
		}
?>
</table>
	</div>
</div>	
	</div>
</div>
<?php } ?>