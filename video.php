<?php
require_once('connection.php');
$i = 0;
$query = mysql_query("SELECT name FROM videos");
$num = mysql_num_rows($query);
// $url = mysql_query("SELECT url FROM videos WHERE name='$result'");

// $ID= mysql_query("SELECT ID FROM videos WHERE name='$name'");
if(isset($_GET['video']) )
{
echo '<iframe width="420" height="315" src="//www.youtube.com/embed/" frameborder="0" allowfullscreen></iframe>';
}
?>

<table class="table">
<tr>
<td>
Име на Видео
</td>
</tr>
<?php 
while ($i < $num){
$result = mysql_result($query, $i); 
$url = mysql_query("SELECT url FROM videos WHERE name='$result'");

?>
<tr>
<td>
<!-- <form name="<?php echo $result; ?>" action="watch_video.php" method="POST">
<?php echo $result; ?>
<input value="<?php echo $result; ?>" type="hidden" />
</form> -->
<form name="video" action="" method="POST">
<?php echo $result; ?>
<input nam value="<?php echo $url; ?>" type="hidden" />
<input type="button" onClick="window.location.href='?video'" />
</form>
</td>
</tr>
<?php $i++ ; } ?>
</table>