<?
	if(!empty($redirectTo)) {
?>
<script>
	setTimeout(function () {
		window.location.href= '<?= $redirectTo ?>';
	}, <?= $timeout ?>);
</script> 
<? } ?> 
<h2><?= $title ?></h2>
<div class="lead"><?= $message ?></div>
