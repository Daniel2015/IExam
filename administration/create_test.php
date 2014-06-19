<?php
	Permissions::OnlyAdmins();
?>

<style>
#questions > ul > li{
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

<?php
require_once("models/TestModel.php");

	if(isset($_POST['submit']))
	{
	if(!empty($_POST['nameTest']))
	{
$nameTest = $_POST['nameTest'];
$test = new TestModel;
$test->description = $nameTest;
$result= $test->insert();
		if($result)
		{
			(new MessagePage)->show("", "Създадохте теста успешно!", "success", "../testsAll");
		} 
		else 
		{
			(new MessagePage)->show("", "Името на теста вече съществува!", "danger");
		}
		}
		else
		{
		(new MessagePage)->show("", "Попълнете полето!", "danger");
		}
}
?>

<div class="panel panel-default">

	  <div class="panel-heading">
		<span><h4 style="display: inline;">Създай тест</h4></span>
	  </div>
	  <div class="panel-body">
	  <form name="submit" action="" method="POST">
	   <div class="form-group">
				  <label>Име:</label>
				  <input class="form-control" type="text" name="nameTest" />
			  </div>
		 <input class="form-control btn btn-primary" name="submit" type="submit" value="Създай Тест"/>
		</form>
	  	  </div>
		  </div>

	<div class="panel panel-success">
		<div class="panel-heading">
			<span><h4 style="display: inline;">Тест</h4></span>
		</div>
		<div class="panel-body">
			<ul id="questions" class="col-md-12" ></ul>
		</div>
		<form id="addQuestion" method="post">
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
				</tr>
				<tr>
		
						<td class="success">
							<textarea style="resize: none;" rows="8" class="form-control input-sm" placeholder="Въпрос" id="question" name="question"></textarea></td>
						<td class="success">	
							<textarea style="resize: none;" rows="8" class="form-control input-sm" placeholder="Отговор A" id="answer1" name="answer1"></textarea></td>
						<td class="success">
							<textarea style="resize: none;" rows="8" class="form-control input-sm" placeholder="Отговор B" id="answer2" name="answer2"></textarea></td>
						<td class="success">
							<textarea style="resize: none;" rows="8" class="form-control input-sm" placeholder="Отговор C" id="answer3" name="answer3"></textarea></td>
						<td class="success">
							<textarea style="resize: none;" rows="8" class="form-control input-sm" placeholder="Отговор D" id="answer4" name="answer4"></textarea></td>
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
	</div>
<script id="galleryTemplate" type="protos-tmpl">
	<div class="panel panel-default">
		<div class="panel-heading">#=question#</div>
		<p class="#=trueAnswer == 'A' ? 'bg-success' : ''#">#=answer1#</p>
		<p class="#=trueAnswer == 'B' ? 'bg-success' : ''#">#=answer2#</p>
		<p class="#=trueAnswer == 'C' ? 'bg-success' : ''#">#=answer3#</p>
		<p class="#=trueAnswer == 'D' ? 'bg-success' : ''#">#=answer4#</p>
	</div>
</script>

<script>
	$(function() {		
		var dataSource = new protos.dataSource({
				data: {
					create: function(dataItems) {
						dataItems.push({
							name: 'test_id',
							value: <?=$_GET["testId"]?>
						});
						
						$.ajax({
							url: '/<?= $ProjectName ?>/api/questions/insert',
							data: dataItems,
							method: 'POST'
						}).done(function (data) {
							if(data !== 'Success')
							{
								return;
							}
							
							dataSource.dataChanged();
							$("#addQuestion")[0].reset();
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
								dataItems = data;
								
								dataSource.readed(data);
							}
						});
						return;
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
			pageSize: 5,
			templateId: 'galleryTemplate'
		});
		
		$('form').on('submit', function(e) {
			e.preventDefault();
			
			var form = $(this)
			, formData = form.serializeArray();
			dataSource.addItems(formData);
		});
	});
</script>