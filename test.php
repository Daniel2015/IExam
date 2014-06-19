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

<ul id="questions" class="col-md-12" ></ul>

<script id="galleryTemplate" type="protos-tmpl">
	<div class="panel panel-default">
		<div class="panel-heading">#=question#</div>
		<p>#=answer1#</p>
		<p>#=answer2#</p>
		<p>#=answer3#</p>
		<p>#=answer4#</p>
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
		
		$('form').on('submit', function(e) {
			e.preventDefault();
			
			var form = $(this)
			, formData = form.serializeArray();
			dataSource.addItems(formData);
		});
	});
</script>