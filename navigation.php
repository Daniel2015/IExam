 <div class="panel panel-default">
	   <div class="panel-heading">
		 <span><h4 style="display: inline;"><?php if(isset($_SESSION["SESS_FIRST_NAME"])){ echo 'Здравей, ' . $_SESSION["SESS_FIRST_NAME"] . '!'; } else {echo "IExam";}?></h4></span>
	   </div>
	<div class="panel-body">
	<p><a href="/<?=$ProjectName?>/index" class="btn btn-info"><span class="glyphicon glyphicon-home">    Home</a></p>
<?php
if(Authentication::IsAuthenticated())
{
?>
   <p><a href="/<?=$ProjectName?>/test" class="btn btn-info" ><span class="glyphicon glyphicon-list-alt"></span>    Тестове</span></a></p>
   <p><a href="/<?=$ProjectName?>/profile" class="btn btn-info" ><span class="glyphicon glyphicon-user"></span>    Профил</a></p>
   <p><a href="/<?=$ProjectName?>/statistics" class="btn btn-info" ><span class="glyphicon glyphicon-stats"></span>    Статистика</a></p>
   <p><a href="/<?=$ProjectName?>/messages/mail" class="btn btn-info" ><span class="glyphicon glyphicon-envelope"></span>    Поща</a></p>
   <p><a href="/<?=$ProjectName?>/video" class="btn btn-info" ><span class="glyphicon glyphicon-film"></span>    Видео</a></p>
<?php
	if(Authentication::IsAdmin())
	{ ?>
		<p><a href="/<?=$ProjectName?>/administration/create_test" class="btn btn-warning" ><span class="glyphicon glyphicon-edit"></span>    Създай тест</a></p>
		<p><a href="/<?=$ProjectName?>/administration/logged_in" class="btn btn-warning" ><span class="glyphicon glyphicon-list"></span>    Логнати</a></p>
		<p><a href="/<?=$ProjectName?>/administration/admin_users" class="btn btn-warning" ><span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-user"></span>     Потребители</a></p>
	<?php } ?>
		<p><a href="/<?=$ProjectName?>/logout" class="btn btn-info" ><span class="glyphicon glyphicon-log-out"></span>    Излез</a></p>
	<?php
	}
else
{
?>
	<p><a href="/<?=$ProjectName?>/login" class="btn btn-info"><span class="glyphicon glyphicon-log-in"></span>    Login</a></p>
	<p><a href="/<?=$ProjectName?>/register" class="btn btn-info"><span class="glyphicon glyphicon-registration-mark"></span>    Register</a></p>
<?php } ?>
	</div>
</div>