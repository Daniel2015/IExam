<?php

	$logged = $_SESSION['SESS_USERNAME'];
	$results = mysql_query("SELECT isAdmin FROM simple_login WHERE username='$logged'");
	$isAdmin = mysql_result($results, 0, "isAdmin");
	
if(!empty($_POST['videoName']) && !empty($_POST['videoUrl']))
{
$name = $_POST['videoName'];
$url = $_POST['videoUrl'];	

mysql_query("INSERT INTO videos (name, link) VALUES ('$name', '$url')");
MessagePage::show("", "Видеото е Създадено", "success", "video");
}
	
$i = 0;
$query = mysql_query("SELECT ID FROM videos");
$num = mysql_num_rows($query);
if(isset($_POST['submit']))
{
	if(!empty($_POST['message'])&&!empty($_POST['url']))
	{
		$message = $_POST['message'];
		$user= $logged;
		$url= $_POST['url'];
		mysql_query("INSERT INTO comments (link, message, user) VALUES ('$url','$message', '$user')");
		//mysql_query("INSERT INTO videos (name, link, comments, fromUser) VALUES ('$name', '$url','$message', '$user')");
	}
}

if(isset($_POST['delete']) && !empty($_POST['delete']))
{
$id = $_POST['delete'];

mysql_query("DELETE FROM videos WHERE ID='$id'");
header('location:video');
}
?>

		<div class="panel panel-success">
			<div class="panel-heading">
				<span><h4 style="display: inline;">Видеота</h4></span>
				
			</div>
			<?php if($isAdmin == 1) { ?>
			<div class="panel-heading">
				<form action="" method="post">
				<label>Име: <input type="text" name="videoName"><br></label>
				<label>URL: <input maxlength="12" type="text" name="videoUrl"><br></label>
				<label><input type="submit" class="btn btn-success btn-lg" value="Създай Видео" /></label>
				</form>

				
			</div>
			<?php } ?>
			<div class="panel-body">

<table class="table-sm">

		<?php 
		while ($i < $num){
		$result = mysql_result($query, $i); 
		$url = mysql_result(mysql_query("SELECT link FROM videos WHERE id='$result'"),0); 
		$name= mysql_result(mysql_query("SELECT name FROM videos WHERE id='$result'"),0);
		?>
	<tr>
		<td>

		<form name="video" action="" method="POST" >
		<input style="float:left;" class="btn btn-info" value="<?php echo $name; ?>" type="button" onClick="window.location.href='?URL=<?php echo $url; ?>'" />
		</form>
				<?php if($isAdmin == 1) { ?>

			<form name="delete" onsubmit="" method="POST" action="" >
			<button style="float:right;" type="submit" name="delete" class=" btn btn-danger" onclick="" value="<?php echo $result; ?>"/>Изтрий</button>
			</form>

			<?php }	?>
		</td>
	</tr>
		
	<tr>
	<td>
	<?php
	if(isset($_GET['URL']) && $_GET['URL'] == $url)
{
echo '<iframe width="420" height="315" src="//www.youtube.com/embed/';?><?php echo $url;?><?php echo'" frameborder="0" allowfullscreen></iframe>';
if(isset($_POST['submit']))
{
	if(!empty($_POST['message']))
	{
		$message = $_POST['message'];
		$user= $logged;
		mysql_query("INSERT INTO videos (name, link, comments, fromUser) VALUES ('$name', '$url','$message', '$user')");
	}
}
}
	?>
	
	</td>
	<td style="width:500px;">
		<?php
	if(isset($_GET['URL']) && $_GET['URL'] == $url){ ?>
	
	<table class="table" style="margin-left:5px; ">
	<tr><td>Потребител</td><td>Коментар</td></tr>
		<tr><?php
		$p=0;
		$query2=mysql_query("SELECT user FROM comments WHERE link='$url'");
		$query3=mysql_query("SELECT message FROM comments WHERE link='$url'");
		$numUsers = mysql_num_rows($query2);
		while ($p < $numUsers){
		$result2 = mysql_result($query2, $p);
		$result3 = mysql_result($query3, $p);
		
			?>
			<td>
			<?php 
			echo $result2;
			?>
			</td>
			<td>
			<?php 
			echo $result3;
			?>
			</td>
		</tr>
		<?php $p++; } ?>
	</table>
<form action="" method="POST">
<textarea style="resize: none;" rows="4" name="message" type="text" class="form-control input-lg" maxlength="1000" id="" placeholder="Коментар"></textarea>
<input type="hidden" name="url" value="<?php echo $url; ?>">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Изпрати" />
</form>
	<?php } ?>
	</td>
	</tr>
	<?php		$i++ ; } ?>
</table>
</div>
</div>