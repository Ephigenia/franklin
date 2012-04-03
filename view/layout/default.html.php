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
	<link rel="stylesheet" type="text/css" href="css/screen.css" />
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" charset="utf-8">
		
		var chartsAPIReadyCallbacks = [];
		var chartsAPIReady = false;
		
		function onChartsReady(callback) {
			if (typeof(callback) !== 'function') {
				throw "Expection function as valid callback.";
			}
			if (!chartsAPIReady) {
				chartsAPIReadyCallbacks.push(callback);
			} else {
				callback.call();
			}
			return true;
		}
		
		function onChartsReadyCallback() {
			chartsAPIReady = true;
			for(var i = 0; i < chartsAPIReadyCallbacks.length; i++) {
				chartsAPIReadyCallbacks[i].call();
			}
		}
		
		google.load('visualization', '1', {packages:['corechart']});
	  	google.setOnLoadCallback(onChartsReadyCallback);
	</script>
</head>
<body>
	<div id="app">
		<?php echo $this->element('main-navigation', array('groups' => $groups)); ?>
		<div id="content" role="main">
			<?php echo $content ?>
		</div>
		<footer>
			<a href="https://github.com/Ephigenia/franklin" rel="external" title="Franklin project page @ github">Franklin v.<?= file_get_contents(FRANKLIN_ROOT.'/VERSION'); ?></a> •
			<a href="http://www.marceleichner.de/?ref=franklin" rel="external">Marcel Eichner // Ephigenia</a>
		</footer>
	</div>
</body>
</html>