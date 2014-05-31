<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading">
			<span><h4 style="display: inline;">Профил</h4></span>
		</div>
		<div class="panel-body">
			<form name="redo" method="POST" action="edit_profile" >
				<p><label>Фак. Номер: <?php echo $_SESSION['SESS_USERNAME'];?></label></p>
				<p><label>Име:<input type="text" name="first_name_NEW" class="form-control" id="first_name_NEW" value="<?php echo $_SESSION['SESS_FIRST_NAME'];?>"/></label></p>
				<p><label>Фамилия: <input type="text" name="last_name_NEW" class="form-control" id="last_name_NEW" value="<?php echo $_SESSION['SESS_LAST_NAME'];?>"/></label></p>
				<p><label>ЕГН: <input type="text" name="ID_NEW" class="form-control" id="ID_NEW" value="<?php echo $_SESSION['SESS_ID'];?>"/></label></p>
				<p><label>Парола: <input type="password" name="password_NEW" class="form-control" id="password_NEW" /></label></p>
				<p><input name="submit" type="submit" value="Редактирай!" class="form-control btn btn-primary"/></p>
				<p><a href="main_login" class="form-control btn btn-info" >Назад</a></p>
				<p><a href="logout" class="form-control btn btn-info" >Излез</a></p>
			</form>
		</div>
	</div>
</div>