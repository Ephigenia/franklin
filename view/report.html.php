<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<base href="./" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Report – Franklin – The Website Metric Recorder</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="apple-touch-icon" href="favicon-iphone.png">
	<link rel="apple-touch-icon" sizes="72x72" href="favicon-iphone.png">
	<link rel="apple-touch-icon" sizes="114x114" href="favicon-iphone4.png">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold">
	<link rel="stylesheet" type="text/css" href="app.css" />
	<?php if (!empty($theme)) { ?>
	<style type="text/css" media="screen">
		<?php require __DIR__.'/../theme/'.$theme.'.php'; ?>
	</style>
	<?php } ?>
</head>
<body>
	<?php
	foreach($groups as $Group) {
		echo $this->element('group', array('Group' => $Group));
	}
	?>
	<footer>
		<a href="https://github.com/Ephigenia/franklin" rel="external" title="Franklin project page @ github">Franklin v.<?= file_get_contents(FRANKLIN_ROOT.'/VERSION'); ?></a> •
		<a href="http://www.marceleichner.de/?ref=franklin" rel="external">Marcel Eichner // Ephigenia</a>
	</footer>
</body>
</html>