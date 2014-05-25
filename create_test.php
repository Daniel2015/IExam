<?php
session_start();
if(!isset($_SESSION['log'])|| ($_SESSION['log'] != 'in')){
session_destroy();
header('location:not_allowed.php');
   exit();
}
if(isset($_GET['log']) && ($_GET['log']=='out')){
session_destroy();
header('location:main.php');
exit();
}
if(!isset($_SESSION['SESS_ADMIN_USERNAME'])){
header('location:not_allowed_user.php');
   exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Вход</title>
		<link rel="stylesheet" type="text/css" href="main.css">
		<link rel="WWW Icon" href="www_icon1.ico"/>
		
		<script>


function createTable() {
var table = document.getElementById("create_table_test");
	document.getElementById("create_table").innerHTML += table.outerHTML;
}
		
		</script>
	</head>
	<body>
		<span id="create_table">
		<table id="create_table_test" class="repeat_table">
				<tr class="tr_test" style="border-bottom:3px solid #0066FF; font-weight:bold">
					<td id="Question">
					Въпрос
					</td>
					<td>
					A
					</td>
					<td>
					B
					</td>
					<td>
					C
					</td>
					<td>
					D
					</td>
					<td>
					True answer
					</td>
					
				</tr>
	<form name="test" action="send_question.php" onsubmit="" method="post">
	
	<tr>
	<td>
	<textarea id="question" name="question" style="width:300px; height:120px;"></textarea></td>
	<td>	
	<textarea id="answer1" name="answer1" style="width:80px; height:120px"></textarea></td>
	<td>
	<textarea id="answer2" name="answer2" style="width:80px; height:120px"></textarea></td>
	<td>
	<textarea id="answer3" name="answer3" style="width:80px; height:120px"></textarea></td>
	<td>
	<textarea id="answer4" name="answer4" style="width:80px; height:120px"></textarea></td>
	<td>
	<input id="true_answer" type="radio" name="true_answer" value="A">A<br>
	<input id="true_answer" type="radio" name="true_answer" value="B">B<br>
	<input id="true_answer" type="radio" name="true_answer" value="C">C<br>
	<input id="true_answer" type="radio" name="true_answer" value="D">D<br>
	</td>
	</tr>
	</table>
	<input name="submit" type="submit" value="Готово" class="btn"/>
	</form>
	<!-- 2 ВАРИАНТ ВМЕСТО С ТАБЛИЦА results и след това преобразуване от js към php, ДА ИЗПОЛЗВАМ НЯКОЛКО БУТОН ЗА НОВ ВЪПРОС И СЛЕД ТОВА 
		QUERY на всичките към db  -->
	
	 <input type="button" onclick="createTable()" value="CreateTable"/> 
	
	
	<table class="table">
				<tr><td></td></tr>
				<tr class="top">
					<td><b>Тестове</b></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><a href="logged_in.php" class="btn" >Логнати</a>
					</td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><a href="admin_users.php" class="btn" >Потребители</a>
					</td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><a href="admin_statistics.php" class="btn" >Обща статистика</a>
					</td>
				</tr>
				<tr><td></td></tr>
					<tr>
						<td><a href="admin.php" class="btn" >Назад</a>
						</td>
					</tr>
				<tr><td></td></tr>
				<tr>
					<td>
					<a href="?log=out" class="btn" >Излез</a>
					</td>
				</tr>
				<tr><td></td></tr>
			</table>
			</span>
	</body>
	
</html>