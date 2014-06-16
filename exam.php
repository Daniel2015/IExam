<?php

?>

<script>
$(document).ready(function(){
  $("#type1").click(function(){
    $("#num_answers").slideDown("slow");
	$("#answer1").slideDown("slow");
	$("#answer_free").hide();
  });
});
$(document).ready(function(){
  $("#type2").click(function(){
    $("#answer_free").slideDown("slow");
	 $("#answer1").hide();
	 $("#num_answers").hide();
  });
});
</script>	
<table class="table btn-success">
	<tr>
		<td>
			Въпрос
		</td>
		<td>
			Тип на отговора
		</td>
		<td>
			Верен отговор
		</td>
		<td>
			Брой точки
		</td>
	</tr>
	<tr>
		<td>
			<textarea style="resize: none;" rows="5" class="form-control input-lg" maxlength="1000"></textarea>
		</td>
		<td>
		<!--	<select id="type" name="type" class="dropdown input-lg form-control">
			<option id="2" value="2">Тест</option>
			<option id="1" value="1">Свободен</option> 
			</select>		-->
			<button class="form-control btn-sm btn-danger" id="type1">Тест</button>
			<button class="form-control btn-sm btn-primary" id="type2">Свободен</button>
		</td>
		<td>
		<table id="test">
		<tr>
		<td>
		<select id="num_answers" name="num_answers" style="resize: none; display:none;" class="dropdown input-lg form-control">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		</select>
		</td>
		<td>
		<?php 
		if(isset($_POST['num_answers']))
{
		$i = $_POST['num_answers'];
					while ($i > 0) {
					?>
		<textarea id="answer1" style="resize: none; display:none;" rows="3" class="form-control input" maxlength="1000" placeholder="Тест"></textarea>
		<?php $i-- ;}}?>
		</td>
		</tr>
		</table>
		<textarea id="answer_free" style="resize: none; display:none;" rows="5" class="form-control input-lg" maxlength="1000" placeholder="Свободен"></textarea>
		</td>
		<td>
			<input class="form-control input-sm">
		</td>
	</tr>
</table>
