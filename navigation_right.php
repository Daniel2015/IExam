<span>
	<div class="panel panel-default">
		<div class="panel-heading">
			<span><h3 style="display: inline;">IExam</h4></span>
		</div>
		<div class="panel-body">		
<label>Текущо време:</label></br>	
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
<span class="badge "><div id="clockbox"></div></span>
<hr style="border:3px solid red">
<label><h4>Новини:</h4></label></br>
<?php
$queryNews = mysql_query("SELECT message FROM messages WHERE toUser=' '");
$numNews = mysql_num_rows($queryNews);

if(isset($_POST['deleteNews']))
{
mysql_query("DELETE FROM messages WHERE fromUser=' ' AND toUser=' '");
}

$k=0;
while($k < $numNews)
{

$resultNews = mysql_result($queryNews, $k);
?>
<p>
<?php
echo '<hr style="border:1px solid black">'; ?>
<?php echo $resultNews; ?>
</p>
<form action="" method="POST">
<button name="deleteNews" class="btn btn-danger">Изтрий</button>
</form>
<?php $k++; } ?>
<hr style="border:3px solid red">

		</div>
	</div>
</span>