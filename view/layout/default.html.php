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

	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<style type="text/css">
	body {
		/* due to fixed top navbar */
		padding-top: 70px;
	}
	#footer {
		padding: 15px 0px;
		height: 60px;
		background-color: #f5f5f5;
	}
	</style>
</head>
<body>
	<div id="app">
		<?php echo $this->element('main-navigation', (array) $content); ?>
		<div id="content" role="main">
			<?php echo $content ?>
		</div>
		<footer id="footer">
			<div class="container">
				<p class="muted">
					<a href="https://github.com/Ephigenia/franklin" rel="external" title="Franklin project page @ github">Franklin v.<?= file_get_contents(FRANKLIN_ROOT.'/VERSION'); ?></a> •
					<a href="http://www.marceleichner.de/?ref=franklin" rel="external">Marcel Eichner // Ephigenia</a>
				</p>
			</div>
		</footer>
	</div>
</body>
</html>