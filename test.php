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

<div id="questions" class="col-md-12" ></div>

<script id="galleryTemplate" type="protos-tmpl">
	<div class="panel panel-default">
		<div class="panel-heading">#=question#</div>
		<p><input type="radio" name="answer" data-char="A" /> #=answer1#</p>
		<p><input type="radio" name="answer" data-char="B" /> #=answer2#</p>
		<p><input type="radio" name="answer" data-char="C" /> #=answer3#</p>
		<p><input type="radio" name="answer" data-char="D" /> #=answer4#</p>
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
							url: '/<?= $ProjectName ?>/api/questions/getByTestUser?testId=<?=$_GET["testId"]?>',
							//data: query,
							success: function(response) {
								var data = {};
								data.data = response;
								data.items = response.length;
								//dataItems = data;

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
			pageSize: 1,
			templateId: 'galleryTemplate'
		});
		
		var listView = $("#questions").data("listView");
		$('#questions').on('click', 'input', function(e) {
			e.preventDefault();
			
			var questionUID = $(this).closest('li').data('uid');
			var questionDataItem = listView.dataSource.findItem(questionUID);
			
			$.ajax({
				url: '/<?= $ProjectName ?>/api/answers/insert',
				type: 'json',
				contentType: "application/json; charset=utf-8",
				type: "GET",
				data: {
					questionId: questionDataItem.id,
					answer: $(this).data('char')
				}
			});
		});
	});
</script>