<?php 
// get last data from tests as array
$data = $Test->last(48);
if (empty($data)) {
	$data = array(0.1);
}

$xAxisLabels = array();
$i = 0;
foreach($data as $timestamp => $value) {
	if ($i == 0 || $i == count($data) - 1 || $i % 12 == 0) {
		$xAxisLabels[] = date('d.m', $timestamp);
	}
	$i++;
}

// shift data -min if minimum is to low
$min = min($data);
if ($min > 0) foreach($data as $k => $v) {
	$data[$k] = $data[$k] - $min;
}

// rescale data to fit into 0-100
$max = max($data);
if ($max > 0) {
	foreach($data as $timestamp => $value) {
		$scaledData[$timestamp] = 100 / $max * $value;
	}
} else {
	$scaledData = $data;
}

$theme = new Theme();

// google charting api image parameters
$imgParams = array(
	// type and data
	'cht' => 'lc',
	'chd' => 't:'.implode(',', $scaledData),
	// size
	'chs' => $theme->chartSize[0].'x'.$theme->chartSize[1],
	// margin
	'chma' => '',
	// colors and styles
	'chm' => 'o,'.$theme->point.',0,-1,5', // point style (type,color,index,series,size)
	'chco' => $theme->line, // line color
	'chf' => implode('|', array(
		'bg,s,65432100', // all chart solid background color
	)),
	// axis colors and styles
	'chxs' => implode('|', array(
		'0,'.$theme->grid.',9,0,lt',
		'1,'.$theme->grid.',9',
	)),
	// axis
	'chxt' => 'x,y',
	// axis sizes
	'chxr' => implode('|', array(
		'1,'.$min.','.($max+$min).','.round(($max) / 4), // y-axis
	)),
	// axis labels
	'chxl' => implode('|', array(
		'0:|'.implode('|', $xAxisLabels), // y-axis
	)),
	// grid
	'chg' => '25,25',
);


$imgUrl = 'http://chart.apis.google.com/chart?'.urldecode(http_build_query($imgParams));
?>
<img src="<?php echo $imgUrl ?>" class="chart" />