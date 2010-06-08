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
		'chtt' => $title,
		'chts' => '000000,10',
		// size
		'chs' => '300x150',
		// margin
		'chma' => '',
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
