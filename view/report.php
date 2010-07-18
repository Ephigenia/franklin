<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<!--[if IE 8]><meta http-equiv="X-UA-Compatible" content="IE=7" /><![endif]-->
		<title><?php echo Franklin::APPNAME ?> v.<?php echo Franklin::APPVERSION ?> - Report</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="imagetoolbar" content="no" />
		<meta name="MSSmartTagsPreventParsing" content="false" />
		<meta name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
		<link rel="stylesheet" type="text/css" href="static/css/dark.css" />
		<link rel="alternate stylesheet" title="Light Style" href="static/css/light.css">
		<link rel="alternate stylesheet" title="Dark Style" href="static/css/dark.css">
	</head>
	<body>
		<div id="app">
			<h1><?php echo Franklin::APPNAME ?> Reports</h1>
			<div id="report">
			<?php
			foreach($TestGroups as $TestGroup) {
				echo $this->renderElement('testGroup', array('TestGroup' => $TestGroup));
			}
			?>
			</div>
			<div id="footer">
				<a href="http://code.marceleichner.de/project/franklin/?ref=franklin" rel="external" title="Frankling project home on code.marceleichner.de">Franklin <?php echo Franklin::APPVERSION; ?></a> •
				<a href="http://www.marceleichner.de/?ref=franklin" rel="external">Marcel Eichner // Ephigenia</a>
			</div>
		</div>
	</body>
</html>