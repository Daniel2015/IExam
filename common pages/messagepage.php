<?php
	if(!empty($redirectTo)) {
		echo '<script>
				setTimeout(function () {
					window.location.href="' . $redirectTo . '";
				}, ' . $timeout . ');
			</script>';
	} 
?>
<div class="alert alert-<?= $type ?>">
	<strong><?= $title ?></strong><br />
	<?= $message ?>
</div>
