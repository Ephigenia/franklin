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
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold">
		<link rel="stylesheet" type="text/css" href="static/css/app.css" />
		<link rel="stylesheet" type="text/css" href="static/css/theme/<?php echo $theme ?>.css" />
	</head>
	<body>
		<div id="app">
			<?php
				foreach($TestGroups as $TestGroup) {
					echo $this->element('testGroup', array('TestGroup' => $TestGroup));
				}
			?>
			<div id="footer">
				<a href="http://code.marceleichner.de/project/franklin/?ref=franklin" rel="external" title="Frankling project home on code.marceleichner.de">Franklin <?php echo Franklin::APPVERSION; ?></a> •
				<a href="http://www.marceleichner.de/?ref=franklin" rel="external">Marcel Eichner // Ephigenia</a>
			</div>
		</div>
	</body>
</html>