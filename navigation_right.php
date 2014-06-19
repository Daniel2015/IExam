<span>
	<div class="panel panel-default">
		<div class="panel-heading">
			<span><h3 style="display: inline;">IExam</h4></span>
		</div>
		<div class="panel-body">
<div class="panel panel-info">
<div class="panel-heading">		
<label>Текущо време:</label></br>
</div>	
	<div class="panel-body">
		<script type="text/javascript">
function GetClock(){
d = new Date();
nday   = d.getDay();
nmonth = d.getMonth();
ndate  = d.getDate();
nyear = d.getYear();
nhour  = d.getHours();
nmin   = d.getMinutes();
nsec   = d.getSeconds();

if(nyear<1000) nyear=nyear+1900;

     if(nhour ==  0) {ap = " AM";nhour = 12;} 
else if(nhour <= 11) {ap = " AM";} 
else if(nhour == 12) {ap = " PM";} 
else if(nhour >= 13) {ap = " PM";nhour -= 12;}

if(nmin <= 9) {nmin = "0" +nmin;}
if(nsec <= 9) {nsec = "0" +nsec;}

document.getElementById('clockbox').innerHTML=""+(nmonth+1)+"/"+ndate+"/"+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
setTimeout("GetClock()", 1000);
}
window.onload=GetClock;
</script>
<span class="badge btn-info"><div id="clockbox"></div></span>
</div>
</div>
<div class="panel panel-info">
<div class="panel-heading">
<label>Новини:</label></br>
</div>
	<div class="panel-body">
<?php
$queryNews = mysql_query("SELECT message, ID FROM messages WHERE toUser=' '");

$resultNews=false;
if($queryNews){
	$numNews = mysql_num_rows($queryNews);

	if(isset($_POST['deleteNewsID']))
	{
	$deleteNewsID = $_POST['deleteNewsID'];
	mysql_query("DELETE FROM messages WHERE toUser=' ' AND ID='$deleteNewsID'");
	MessagePage::show("", "Новината е Изтрита!", "danger", "/$ProjectName/index");
	}

	$k=0;
	while($k < $numNews)
	{
		$resultNews = mysql_result($queryNews, $k, "message");
		$resultNewsID = mysql_result($queryNews, $k, "ID");

?>
<div class="alert alert-warning">
<?php
	if($resultNews){
		echo $resultNews;
	}
?>
</div>
<form action="" method="POST" name="delete">
<button type="submit" name="deleteNewsID" class="btn btn-danger" value="<?php echo $resultNewsID; ?>">Изтрий</button>
</form>
<br>
<?php
		$k++;
	}
}
?>
</div>
</div>
		</div>
	</div>
</span>