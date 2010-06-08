<div class="Test">
	<?php 
	// get last data from tests as array
	$data = $Test->last(48);
	
	// get chart title from test’s name
	$title = $Test->name;
	// append interval time to test’s title
	if ($Test->interval > 3600) {
		$title .= ' (every '.round($Test->interval / 3600).'h)';
	} else {
		$title .= ' (every '.round($Test->interval / 60).'m)';
	}
	
	$xAxisLabels = array();
	$i = 0;
	foreach($data as $timestamp => $value) {
		if ($i == 0 || $i == count($data) - 1 || $i % 12 == 0) {
			$xAxisLabels[] = date('d.m', $timestamp);
		}
		$i++;
	}

	// google charting api image parameters
	$imgParams = array(
		// type and data
		'cht' => 'lc',
		'chd' => 't:'.implode(',', $data),
		// title
		'chtt' => $title,		// title
		'chts' => '30303F,10',	// title color and size
		// size
		'chs' => '275x135',
		// margin
		'chma' => '',
		// colors and styles
		'chm' => 'o,50741D,0,-1,4', // point style (type,color,index,series,size)
		'chco' => '84D626', // line color
		'chf' => implode('|', array(
			'bg,s,65432100', // all chart solid background color
			'c,lg,90,FDFDF9,0,FFFFFF,1', // chart background color
		)),
		// axis colors and styles
		'chxs' => implode('|', array(
			'0,30303F,9,0,lt',
			'1,30303F,9',
		)),
		// axis
		'chxt' => 'x,y',
		// axis sizes
		'chxr' => implode('|', array(
			'1,0,'.max($data).','.floor(max($data) / 4), // y-axis
		)),
		// axis labels
		'chxl' => implode('|', array(
			'0:|'.implode('|', $xAxisLabels), // x-axis
		)),
		// grid
		'chg' => '25,25',
	);
	
	
	$imgUrl = 'http://chart.apis.google.com/chart?'.urldecode(http_build_query($imgParams));
	?>
	<img src="<?php echo $imgUrl ?>" class="chart" alt="<?php echo $title; ?>"/>
</div>
