<?php

$logged  = $_SESSION['SESS_USERNAME'];
$results = mysql_query("SELECT isAdmin FROM simple_login WHERE username='$logged'");
$isAdmin = mysql_result($results, 0, "isAdmin");

if (!empty($_POST['videoName']) && !empty($_POST['videoUrl'])) {
    $name = $_POST['videoName'];
    $url  = $_POST['videoUrl'];
    preg_match('#(\.be/|/embed/|/v/|/watch\?v=)([A-Za-z0-9_-]{5,11})#', $url, $matches);
    if (isset($matches[2]) && $matches[2] != '') {
        $url = $matches[2];
    }
    
    
    $video = mysql_query("INSERT INTO videos (name, link) VALUES ('$name', '$url')");
    if ($video) {
        MessagePage::show("", "Видеото е създадено!", "success", "video");
    } else {
        MessagePage::show("", "Видеото вече съществува!", "danger", "video");
    }
}

$i     = 0;
$query = mysql_query("SELECT ID FROM videos ORDER BY ID");
$num   = mysql_num_rows($query);
if (isset($_POST['submit'])) {
    if (!empty($_POST['message']) && !empty($_POST['url'])) {
        $message = $_POST['message'];
        $user    = $logged;
        $url     = $_POST['url'];
        mysql_query("INSERT INTO comments (link, message, user) VALUES ('$url','$message', '$user')");
        MessagePage::show("", "Коментарът е изпратен", "success", "video?URL=$url");
    }
}

if (isset($_POST['delete']) && !empty($_POST['delete'])) {
    $id = $_POST['delete'];
    
    mysql_query("DELETE FROM videos WHERE ID='$id'");
    header('location:video');
}
?>
<style>
.scrollable{
	overflow-y:scroll;
	height:250px;
	width:400px;
	}
	
.videoHeader {
    white-space: normal;
    width:75%;
}
.videoDelete {
	white-space: normal;
}
</style>

		<div class="panel panel-success">
			<div class="panel-heading">
				<span><h4 style="display: inline;">Видеа</h4></span>
				
			</div>
			<?php
if ($isAdmin == 1) {
?>
			<div class="panel-heading">
				<form action="" method="post">
				<label>Име: <input type="text" name="videoName"><br></label>
				<label>URL: <input type="text" name="videoUrl"><br></label>
				<label><input type="submit" class="btn btn-success btn-lg" value="Създай Видео" /></label>
				</form>

				
			</div>
			<?php
}
?>
			<div class="panel-body">
	<table class="table" style="float:left; width:400px;">
	<td rowspan="<?php
echo $num;
?>" style="width:400px;">
	<?php
if (isset($_GET['URL'])) {
    echo '<iframe width="400" height="300" src="//www.youtube.com/embed/';
?><?php
    echo $_GET['URL'];
?><?php
    echo '" frameborder="0" allowfullscreen></iframe>';
    echo '<table class="table"><tr><td style="width:40%">Потребител</td><td style="width:60%">Коментар</td></tr></table>';
    echo '<div class="scrollable">';
?>
	
	<table class="table">
	
		<tr>
		<?php
    
    $p        = 0;
    $url1     = $_GET['URL'];
    $query2   = mysql_query("SELECT user FROM comments WHERE link='$url1'");
    $query3   = mysql_query("SELECT message FROM comments WHERE link='$url1'");
    $numUsers = mysql_num_rows($query2);
    while ($p < $numUsers) {
        $result2 = mysql_result($query2, $p);
        $result3 = mysql_result($query3, $p);
        
?>
			<td style="width:40%">
			<?php
        echo $result2;
?>
			</td>
			<td style="width:60%">
			<?php
        echo $result3;
?>
			</td>
		</tr>
		<?php
        $p++;
    }
    
?>
		</td>
	</table>
	</div>
<form action="" method="POST" width="400">
<textarea style="resize: none; width:400px" rows="4" name="message" type="text" class="form-control input-lg" maxlength="1000" placeholder="Коментар"></textarea>
<input type="hidden" name="url" value="<?php
    echo $_GET['URL'];
?>">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Изпрати" />
</form>
	<?php
}
?>
	</div>
	</td>
	
</table>
<table class="table-sm" style="float:right">

		<?php
while ($i < $num) {
    $result = mysql_result($query, $i);
    $url    = mysql_result(mysql_query("SELECT link FROM videos WHERE id='$result'"), 0);
    $name   = mysql_result(mysql_query("SELECT name FROM videos WHERE id='$result'"), 0);
?>
	<tr>
		<td style="width:400px;">
<span>
		<form name="video" action="" method="POST" >
		<input style="float:left;" class="btn btn-info videoHeader" value="<?php
    echo $name;
?>" type="button" onClick="window.location.href='?URL=<?php
    echo $url;
?>'" />
		</form>
			<?php
    if ($isAdmin == 1) {
?>

		<form name="delete" onsubmit="" method="POST" action="" >
		<button style="float:left;" type="submit" name="delete" class=" btn btn-danger videoDelete" onclick="" value="<?php
        echo $result;
?>"/>Изтрий</button>
		</form>
</span>
			<?php
    }
?>
		</td>
	</tr>
		
	<tr>
	<td>
	
	
	</td>
	
	</tr>
	<?php
    $i++;
}
?>
	</table>

</div>
</div>
