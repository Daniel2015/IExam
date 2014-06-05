 <div class="panel panel-default">
	   <div class="panel-heading">
		 <span><h4 style="display: inline;">Здравей, <?php if(isset($_SESSION["SESS_FIRST_NAME"])) echo $_SESSION["SESS_FIRST_NAME"] ?>!</h4></span>
	   </div>
	<div class="panel-body">
	<p><a href="index" class="btn btn-info">Home</a></p>
<?php
if(Authentication::IsAuthenticated())
{
?>
   <p><a href="test" class="btn btn-info" >Тестове</a></p>
   <p><a href="profile" class="btn btn-info" >Профил</a></p>
   <p><a href="statistics" class="btn btn-info" >Статистика</a></p>
   <p><a href="mailUser" class="btn btn-info" >Поща</a></p>
   <p><a href="logout" class="btn btn-info" >Излез</a></p>
<?php
}
else
{
?>
	<p><a href="login" class="btn btn-info">Login</a></p>
	<p><a href="register" class="btn btn-info">Register</a></p>
<?php } ?>
	</div>
</div>