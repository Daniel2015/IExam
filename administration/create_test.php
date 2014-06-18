<?php
	Permissions::OnlyAdmins();
?>

<ul id="questions"></ul>

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
	<tr>
		<form method="post">
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
			<td>
				<button type="submit" class="submitBtn">Добави въпрос</button>
			</td>
		</form>
	</tr>
</table>
<input name="submit" type="submit" value="Готово" class="btn btn-info"/>

<script>
	$(function() {
		$.ajax({
			url: '/<?= $ProjectName ?>/api/questions/getByTest?testId=' + <?=$_GET["testId"]?>
		}).done(function(data) {
			for(var index in data)
			{
				var dataItem = data[index];
				$("#questions").append('<li>' + dataItem.question  + '</li>');
			}
		});
	
		$('form').on('submit', function(e) {
			e.preventDefault();
			var form = $(this)
			, formData = form.serializeArray();
			
			formData.push({
				name: 'test_id',
				value: <?=$_GET["testId"]?>
			});
			
			$.ajax({
				url: '/<?= $ProjectName ?>/api/questions/insert',
				data: formData,
				method: 'POST'
			}).done(function (data) {
				alert('Success: ' + data);
			}).fail(function () {
				alert('Fail');				
			});
		});
	});
</script>