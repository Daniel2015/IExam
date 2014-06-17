<?php
	Permissions::OnlyAdmins();
	
	if(isset($_POST['submit']))
	{
	
	if(empty($_POST['question']) || empty($_POST['answer1']) || empty($_POST['answer2']) || empty($_POST['answer3']) || empty($_POST['answer4']) || empty($_POST['true_answer'])){
	(new MessagePage)->show("", "Попълнете всички полета!", "danger");
	}
	else {
	$question = $_POST['question'];
	$answer1 = $_POST['answer1'];
	$answer2 = $_POST['answer2'];
	$answer3 = $_POST['answer3'];
	$answer4 = $_POST['answer4'];
	$true_answer = $_POST['true_answer'];

	$result= mysql_query("INSERT INTO test (question, answer1, answer2, answer3, answer4, true_answer)VALUES('$question', '$answer1', '$answer2', '$answer3', '$answer4', '$true_answer')" );
	if($result){
			(new MessagePage)->show("", "Тестът е изпратен успешно!", "success", "admin");
			exit();
			} 
			
			else {
			(new MessagePage)->show("", "Попълнете всички полета!", "danger");
			mysql_error();
			}
	mysql_close($bd);
	}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Вход</title>
		
		<script>


function createTable() {
var table = document.getElementById("create_table_test");
	document.getElementById("create_table").innerHTML += table.outerHTML;
}
		
		</script>
	</head>
	<body>
	<span>	
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
	<form name="submit" action="" onsubmit="" method="post">
	
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
	<input name="submit" type="submit" value="Готово" class="btn btn-info"/>
	</form>
	<!-- 2 ВАРИАНТ ВМЕСТО С ТАБЛИЦА results и след това преобразуване от js към php, ДА ИЗПОЛЗВАМ НЯКОЛКО БУТОН ЗА НОВ ВЪПРОС И СЛЕД ТОВА 
		QUERY на всичките към db  -->
	
	<!-- <input type="button" onclick="createTable()" value="CreateTable"/>   -->
	</span>
		
	</body>
	
</html>