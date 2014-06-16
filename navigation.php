 <div class="panel panel-default">
	   <div class="panel-heading">
		 <span><h4 style="display: inline;">Здравей, <?php if(isset($_SESSION["SESS_FIRST_NAME"])) echo $_SESSION["SESS_FIRST_NAME"] ?>!</h4></span>
	   </div>
	<div class="panel-body">
	<p><a href="/<?=$ProjectName?>/index" class="btn btn-info">Home</a></p>
<?php
if(Authentication::IsAuthenticated())
{
?>
   <p><a href="/<?=$ProjectName?>/test" class="btn btn-info" >Тестове</a></p>
   <p><a href="/<?=$ProjectName?>/profile" class="btn btn-info" >Профил</a></p>
   <p><a href="/<?=$ProjectName?>/statistics" class="btn btn-info" >Статистика</a></p>
   <p><a href="/<?=$ProjectName?>/messages/mail" class="btn btn-info" >Поща</a></p>
   <p><a href="/<?=$ProjectName?>/video" class="btn btn-info" >Видеота</a></p>
<?php
	if(Authentication::IsAdmin())
	{ ?>
		<p><a href="/<?=$ProjectName?>/administration/create_test" class="btn btn-warning" >Създай тест</a></p>
		<p><a href="/<?=$ProjectName?>/administration/logged_in" class="btn btn-warning" >Логнати</a></p>
		<p><a href="/<?=$ProjectName?>/administration/admin_users" class="btn btn-warning" >Потребители</a></p>
	<?php } ?>
		<p><a href="/<?=$ProjectName?>/logout" class="btn btn-info" >Излез</a></p>
	<?php
	}
else
{
?>
	<p><a href="/<?=$ProjectName?>/login" class="btn btn-info">Login</a></p>
	<p><a href="/<?=$ProjectName?>/register" class="btn btn-info">Register</a></p>
<?php } ?>
	</div>
</div>