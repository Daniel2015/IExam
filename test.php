<?php
Permissions::OnlyAuthenticated();
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

<div id="questions" class="col-md-12" ></div>

<script id="galleryTemplate" type="protos-tmpl">
	<div class="panel panel-default">
		<div class="panel-heading">#=question#</div>
		<p class="#=answer === 'A' ? 'bg-primary': ''#"><input #=answer === 'A' ? 'checked': ''# type="radio" name="answer" data-char="A" /> #=answer1#</p>
		<p class="#=answer === 'B' ? 'bg-primary': ''#"><input #=answer === 'B' ? 'checked': ''# type="radio" name="answer" data-char="B" /> #=answer2#</p>
		<p class="#=answer === 'C' ? 'bg-primary': ''#"><input #=answer === 'C' ? 'checked': ''# type="radio" name="answer" data-char="C" /> #=answer3#</p>
		<p class="#=answer === 'D' ? 'bg-primary': ''#"><input #=answer === 'D' ? 'checked': ''# type="radio" name="answer" data-char="D" /> #=answer4#</p>
	</div>
</script>

<script>
	$(function() {		
		var dataSource = new protos.dataSource({
				data: {
					read: function(query, deferred) {
						$.ajax({
							type: 'json',
							contentType: "application/json; charset=utf-8",
							type: "GET",
							url: '/<?= $ProjectName ?>/api/questions/getByTestUser?testId=<?=$_GET["testId"]?>',
							success: function(response) {
								var data = {};
								data.data = response;
								data.items = response.length;

								deferred.resolve(response);
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
			var answerRadio = $(this);
			var questionUID = answerRadio.closest('li').data('uid');
			var questionDataItem = listView.dataSource.findItem(questionUID);
			
			questionDataItem.answer = $(this).data('char');
			
			$.ajax({
				url: '/<?= $ProjectName ?>/api/answers/insert',
				type: 'json',
				contentType: "application/json; charset=utf-8",
				type: "GET",
				data: {
					questionId: questionDataItem.id,
					answer: $(this).data('char')
				}
			}).done(function (data) {
				if(data === 'Success') {
					var pharagraphs = answerRadio.closest('li').find('p');
					$.each(pharagraphs, function(i, p) {
						$(p).removeClass('bg-primary');
					});
					
					console.log(answerRadio.closest('p').addClass('bg-primary'));
				}
			});
		});
	});
</script>