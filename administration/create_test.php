<?php
	Permissions::OnlyAdmins();
?>

<ul id="questions" class="col-md-12" ></ul>
<style>
#questions li.listViewItem {
	width: 100%
}
#questions li.pageNumber {
	display: inline-block
}
</style>

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

<script id="galleryTemplate" type="protos-tmpl">
<div><b>#=question#</b>    - > #=answer1#</div>
</script>

<script>
	$(function() {	
		var dataSource = new protos.dataSource({
				data: {
					create: function(dataItems) {
						console.log(dataItems);
						dataItems.push({
							name: 'test_id',
							value: <?=$_GET["testId"]?>
						});
						
						$.ajax({
							url: '/<?= $ProjectName ?>/api/questions/insert',
							data: dataItems,
							method: 'POST'
						}).done(function (data) {
							dataSource.dataChanged();
							alert('Success: ' + data);
						}).fail(function () {
							alert('Fail');				
						});
					},
					read: function(query) {
						$.ajax({
							type: 'json',
							contentType: "application/json; charset=utf-8",
							type: "GET",
							url: '/<?= $ProjectName ?>/api/questions/getByTest?testId=<?=$_GET["testId"]?>',
							//data: query,
							success: function(response) {
								var data = {};
								data.data = response;
								data.items = response.length;
								
								dataSource.readed(data);
							}
						});
					}
				},
				server: {
					paging: false,
					filtering: false,
					sorting: false
				}
			});
		
		$("#questions").protos().listView({
			data: dataSource,
			pageSize: 3,
			templateId: 'galleryTemplate'
		});
	
		$('form').on('submit', function(e) {
			e.preventDefault();
			
			var form = $(this)
			, formData = form.serializeArray();
			dataSource.addItems(formData);
			
			
			// formData.push({
				// name: 'test_id',
				// value: <?=$_GET["testId"]?>
			// });
			
			// $.ajax({
				// url: '/<?= $ProjectName ?>/api/questions/insert',
				// data: formData,
				// method: 'POST'
			// }).done(function (data) {
				// alert('Success: ' + data);
			// }).fail(function () {
				// alert('Fail');				
			// });
		});
	});
</script>