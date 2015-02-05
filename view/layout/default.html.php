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
	<link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.2/darkly/bootstrap.min.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
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
		.asc {
			color: #008000;
		}
		.desc {
			color: #ff0000;
		}
	</style>
</head>
<body>
	<?php echo $this->element('main-navigation', (array) $content); ?>
	<div class="container" role="main">
		<?php echo $content ?>
	</div>
	<footer class="container text-center">
		<hr>
		<a href="https://github.com/Ephigenia/franklin" rel="external" title="Franklin project page @ github">Franklin</a> •
		<a href="http://www.marceleichner.de/?ref=franklin" rel="external">Marcel Eichner // Ephigenia</a>
	</footer>
</body>
</html>