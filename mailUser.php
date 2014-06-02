<?php
	if(!isset($_SESSION['log'])|| ($_SESSION['log'] != 'in'))
	{
		session_destroy();
		(new MessagePage)->show("", "Моля, влезте в системата!", "danger", "login");
		 exit();
	}
	if(!isset($_SESSION['SESS_FIRST_NAME']))
	{
		(new MessagePage)->show("", "Нямата достъм до тази страница!", "danger", "login");
		exit();
	}
?>
<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span><h4 style="display: inline;">Поща</h4></span>
					</div>
					<div class="panel-body">
						<p><a href="messages/sendUser" class="btn btn-info" >Напиши</a></p>
						<p><a href="messages/incomingUser" class="btn btn-info" >Входящи</a></p>
						<p><a href="messages/outgoingUser" class="btn btn-info" >Изходящи</a></p>
						<p><a href="main_login" class="btn btn-info" >Назад</a></p>
						<p><a href="logout" class="btn btn-info" >Излез</a></p>
					</div>
				</div>
			</div>