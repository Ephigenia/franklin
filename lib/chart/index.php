<?php

/**
 * 	Franklin: <http://franklin.sourecforge.net>
 * 	Copyright 2009+, Ephigenia M. Eichner, Kopernikusstr. 8, 10245 Berlin
 *
 * 	Licensed under The MIT License
 * 	Redistributions of files must retain the above copyright notice.
 * 	@license		http://www.opensource.org/licenses/mit-license.php The MIT License
 * 	@copyright	copyright 2007+, Ephigenia M. Eichner
 * 	@link			http://code.ephigenia.de/projects/franklin/
 * 	@version		$Rev: 6 $
 * 	@modifiedby		$LastChangedBy: ephigenia $
 * 	@lastmodified	$Date: 2009-10-17 15:42:57 +0200 (Sat, 17 Oct 2009) $
 * 	@filesource		$HeadURL: https://ephigenia@franklin.svn.sourceforge.net/svnroot/franklin/trunc/lib/chart/index.php $
 */

// chart size
if (isset($_REQUEST['size']) && preg_match('@\d+x\d+@', $_REQUEST['size'])) {
	list($width, $height) = array_map('intval', array_map('abs', explode('x', $_REQUEST['size'])));
} else {
	$width = 300;
	$height = 150;
}

// chart data
$data = array();
if (isset($_REQUEST['data'])) {
	$data = explode(',', $_REQUEST['data']);
	// check if ther’re labels passed too
	if (isset($data[0]) && strpos($data[0], '=')) {
		foreach($data as $k => $v) {
			unset($data[$k]);
			list($label, $value) = explode('=', $v);
			$data[$label] = $value;
		}
	}
	$data = array_map('floatval', $data);
}

// chart type
$chartType = isset($_REQUEST['type']) ? $_REQUEST['type'] : 'LineChart';
if (!in_array($chartType, array('BarChart', 'LineChart'))) {
	$chartType = 'LineChart';
}

// chart background
$backgroundColor = isset($_REQUEST['bgcolor']) ? trim($_REQUEST['bgcolor']) : 'ffffff';

class_exists($chartType) or require dirname(__FILE__).'/'.$chartType.'.php';

// create chart
$chart = new $chartType($width, $height, $data);
$chart->backgroundColor = $backgroundColor;

if (isset($_REQUEST['title'])) {
	$chart->title = $_REQUEST['title'];
}
header('Content-Type: image/png');
echo $chart->render();