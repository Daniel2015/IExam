<?php
require_once('connection.php');
if(!empty($_POST['name']) && !empty($_POST['url']))
{
$name = $_POST['name'];
$url = $_POST['url'];	

mysql_query("INSERT INTO videos (name, link) VALUES ('$name', '$url')");
MessagePage::show("", "Видеото е изпратено", "success", "video");
}
?>


<form action="" method="post">
Video Name: <input type="text" name="name"><br>
Url: <input type="text" name="url"><br>
<input type="submit">
</form>

