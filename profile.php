<?php
	require_once("models/UsersModel.php");
	
	Permissions::OnlyAuthenticated();
	
	$user = new UsersModel;
	$user = $user->getItems("WHERE username='" . $_SESSION['SESS_USERNAME'] . "'")[0];
	
if(isset($_GET['id']) && !Authentication::IsAdmin())
{
header('location:profile');
}

	if(isset($_GET['id']) && Authentication::IsAdmin())
	{
		$member_id = $_GET['id'];
		$user = $user->getItems("WHERE member_id=$member_id")[0];
		if(!$user)
		{
		header('location:profile');
		}
	}
	
	if(isset($_POST['submit']))
	{
		$fname=$_POST['first_name_NEW'];
		$lname=$_POST['last_name_NEW'];
		$ID=$_POST['ID_NEW'];
		$password_NEW=$_POST['password_NEW'];
		
		$user->firstName = $fname;
		$user->lastName = $lname;
		$user->egn = $ID;
		
		if($password_NEW !== null && !empty($password_NEW))
		{
			$user->password = $password_NEW;
			$user->encryptPassword();
		}
		
		$result= $user->update();
		if($result){
			MessagePage::show("", "Редактирането е успешно!", "success", "index");
			$_SESSION['SESS_FIRST_NAME']= $_POST['first_name_NEW'];
			exit();
		}
	}

	$profile_picture = mysql_result(mysql_query("SELECT profile_picture FROM simple_login WHERE username='" . $_SESSION['SESS_USERNAME'] . "'"), 0);
	
	if(isset($_GET['id']) && Authentication::IsAdmin())
	{
	$profile_picture = mysql_result(mysql_query("SELECT profile_picture FROM simple_login WHERE member_id=$member_id"), 0);
	}
	
	if($profile_picture == null)
	{
		$profile_picture = "images/defaultProfile.png";
	}
	
	if(isset($_POST['image']))
	{
		$profile_picture = $_POST['images'];
		mysql_query("UPDATE simple_login SET profile_picture='$profile_picture' WHERE username='" . $_SESSION['SESS_USERNAME'] . "'");
		header('Location:profile'); 
	}

		if(isset($_POST['delete']))
	{
		$profile_picture = 'NULL';
		mysql_query("UPDATE simple_login SET profile_picture=$profile_picture WHERE username='" . $_SESSION['SESS_USERNAME'] . "'");
		header('Location:profile'); 
	}
?>
<div class="panel panel-success">
		<div class="panel-heading">
			<span><h4 style="display: inline;" >Профил</h4></span>
		</div>
		<div class="panel-body">
		<div class="col-md-5" style="float:left;" style="float:left;">
		
<?php if(!isset($_GET['id'])) { ?>
		
			<form method="POST" action="" class="form-inline"  name="image">
			<label><strong>Профилна снимка (16*9) URL:</strong><input name="images" class="form-control"  type="text"/>
				<button type="submit" class="btn btn-info"  name="image">Смени</button></label>
			</form>		
<?php 	if($profile_picture != 'images/defaultProfile.png') { ?>
			<form method="POST" action="" class="form-inline"  name="delete">
				<button type="submit" class="btn btn-danger"  name="delete">Изтрий</button></label> 
			</form>	
<?php } ?>

<?php } ?>
		
			<img src="<?php echo $profile_picture; ?>" class="img-rounded" style="max-width:320px; max-height:570px;"/> 
		</div> 
		
		<div class="col-md-7" style="float:right;">
		<form name="submit" method="POST" action="" >
					<div style="float:left;">					
				<p><label>Фак. Номер: <input type="text" name="username_NEW" class="form-control" id="username_NEW" value="<?= $user->username ?>" disabled="disabled" /></label></p>
				<p><label>Име: <input type="text" name="first_name_NEW" class="form-control" id="first_name_NEW" value="<?= $user->firstName ?>" <?php if(isset($_GET['id']) && Authentication::IsAdmin()) { ?> disabled="disabled" <?php } ?> /></label></p>
				<p><label>Фамилия: <input type="text" name="last_name_NEW" class="form-control" id="last_name_NEW" value="<?= $user->lastName ?>" <?php if(isset($_GET['id']) && Authentication::IsAdmin()) { ?> disabled="disabled" <?php } ?> /></label></p>
				</div>
				<div style="float:right;">
				<p><label>ЕГН: <input type="text" name="ID_NEW" class="form-control" id="ID_NEW" value="<?= $user->egn ?>" <?php if(isset($_GET['id']) && Authentication::IsAdmin()) { ?> disabled="disabled" <?php } ?> /></label></p>
				<p><label>Нова парола: <input type="password" name="password_NEW" class="form-control" id="password_NEW" <?php if(isset($_GET['id']) && Authentication::IsAdmin()) { ?> disabled="disabled" <?php } ?> /></label></p>
				</div>
				<?php if(!isset($_GET['id'])) { ?><p><input name="submit" type="submit" value="Редактирай" class="form-control btn btn-primary" /></p><?php } ?>
			</form>
			</div>

		</div>
	</div>
	<div class="panel panel-success">
		<div class="panel-heading">
			<span><h4 style="display: inline;" >Статискика тестове</h4></span>
		</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<tr>
					<td style="width:150px;">Брой Тестове:
					</td>
					<td class="success">
					</td>
					<td style="width:150px;">Среден процент верни отговори:
					</td>
					<td class="danger">
					</td>
					<td style="width:150px;">Всички:
					</td>
					<td class="info">
					</td>
				</tr>
			</table> 
		</div>
		<table class="table table-bordered table-hover table-condensed table-responsive">
			<tr class="active table-hover info">
				<td>Тест</td>
				<td>Процент верни отговори</td>
			</tr>
<?php
	$query = mysql_query("SELECT description, test_id, COUNT(CASE WHEN answer = true_answer THEN 1 END) as trueAnswers
	FROM test_questions as q 
	LEFT JOIN (SELECT * FROM `test_answers`) as a 
		ON q.question_id = a.question_id 
	LEFT JOIN (SELECT id, description FROM tests) as t
		ON q.test_id = t.id
	WHERE username='$_SESSION[SESS_USERNAME]' GROUP BY test_id") or die(mysql_error());

	if(isset($_GET['id']) && Authentication::IsAdmin())
	{
		$username =	mysql_result(mysql_query("SELECT username FROM simple_login WHERE member_id=$member_id"), 0);
		$query = mysql_query("SELECT description, test_id, COUNT(CASE WHEN answer = true_answer THEN 1 END) as trueAnswers
	FROM test_questions as q 
	LEFT JOIN (SELECT * FROM `test_answers`) as a 
		ON q.question_id = a.question_id 
	LEFT JOIN (SELECT id, description FROM tests) as t
		ON q.test_id = t.id
	WHERE username='$username' GROUP BY test_id") or die(mysql_error());
	}
	
	while ($row = mysql_fetch_array($query)) {
	$qid = $row['test_id'];
	$qcount = mysql_result(mysql_query("SELECT COUNT(test_id) FROM test_questions WHERE test_id='$qid'"), 0);
		echo '<tr class="active table-hover">
				<td>
				'.$row['description'].'
				</td>
				<td>
				'.round(($row['trueAnswers'] / $qcount ) * 100, 2) .'%
				</td>
				</tr>';
		}
?>
		</table>
	</div>