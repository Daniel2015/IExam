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
.radio_button{
    width: 1.5em;
    height: 1.5em;
}
</style>
	<div class="panel panel-success">
	<div class="panel-heading">
						<span><h4 style="display: inline;">Тест</h4></span>
					</div>
					<div class="panel-body">
					asd
						</div>
<table class="table table-bordered table-hover table-condensed">
	<tr class="active table-hover" style="text-align:center;">
		<td>
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
		Отговор
		</td>
	</tr><form method="post">
	<tr>
		
			<td class="success">
				<textarea style="resize: none;" rows="15" class="form-control input-lg" placeholder="Въпрос" id="question" name="question"></textarea></td>
			<td class="success">	
				<textarea style="resize: none;" rows="20" class="form-control input-sm" placeholder="Отговор A" id="answer1" name="answer1"></textarea></td>
			<td class="success">
				<textarea style="resize: none;" rows="20" class="form-control input-sm" placeholder="Отговор B" id="answer2" name="answer2"></textarea></td>
			<td class="success">
				<textarea style="resize: none;" rows="20" class="form-control input-sm" placeholder="Отговор C" id="answer3" name="answer3"></textarea></td>
			<td class="success">
				<textarea style="resize: none;" rows="20" class="form-control input-sm" placeholder="Отговор D" id="answer4" name="answer4"></textarea></td>
			<td class="danger" style="vertical-align:middle">
			<center>
				<input id="true_answer" type="radio" name="true_answer" class="radio_button" value="A">A<br>
				<input id="true_answer" type="radio" name="true_answer" class="radio_button" value="B">B<br>
				<input id="true_answer" type="radio" name="true_answer" class="radio_button" value="C">C<br>
				<input id="true_answer" type="radio" name="true_answer" class="radio_button" value="D">D<br>
				</center>
			</td>
		
	</tr>
</table>
	<button type="submit" class="submitBtn btn btn-info">Добави въпрос</button>
</form>
<input name="submit" type="submit" value="Готово" class="btn btn-info"/>

<script id="galleryTemplate" type="protos-tmpl">
<div><b> #=question#</b>    - > #=answer1#</div>
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