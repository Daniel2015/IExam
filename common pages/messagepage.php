<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="main.css">
		<link rel="WWW Icon" href="www_icon1.ico"/>
		<title><?= $title ?></title>
		<script>
			setTimeout(function () {
				window.location.href= '<?= $redirectTo ?>';
				}
				, <?= $timeout ?>);
		</script>
	</head>
	<body>
		<b><?= $message ?></b>
	</body>
</html>