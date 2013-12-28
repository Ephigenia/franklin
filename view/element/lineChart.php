<?php

if (!isset($lineWidth)) {
	$lineWidth = 2;
}

$data = $this->franklin->storage($Test)->getLatestValues(30);

if (empty($data)) {
	echo 'no-data';
	return true;
}
foreach($data as $index => $line) {
	$data[$index] = array(
		$line[0]->format('c'),
		$line[1],
		0
	);
	if (isset($data[$index - 1])) {
		$data[$index][2] = $data[$index][1] - $data[$index - 1][1];
	}
}

$chartId = 'chart-'.$Test->uniqueId();

?>
<script type="text/javascript">
	onChartsReady(function() {
		var chartData = <?php echo json_encode($data); ?>;
		for(i = 0; i < chartData.length; i++) {
			chartData[i][0] = new Date(chartData[i][0]);
		}
		var data = new google.visualization.DataTable();
		data.addColumn('date', 'Date');
		data.addColumn('number', 'Value');
		data.addColumn('number', 'Delta');
		data.addRows(chartData);

		var options = {
			strictFirstColumnType: false,
			titlePosition: 'none',
			lineWidth: <?= $lineWidth ?>,
			pointSize: <?= ceil($lineWidth * 1.75) ?>,
			colors: ['#1B51C1', '#CAD5FF'],
			chartArea: {
				width: '75%',
				height: '80%'
			},
			height: '100%',
			width: '500px',
			series: {
				0: {
					targetAxisIndex: 0,
					type: 'line'
				},
				1: {
					targetAxisIndex: 1,
					type: 'bars'
				}
			},
			bar: {
				groupWidth: '50' // makes bars very thick
			},
			hAxis: {
				format: "dd.M."
			},
			legend: {
				position: 'none'
			}
		};
		var chart = new google.visualization.ComboChart(document.getElementById('<?php echo $chartId; ?>'));

		chart.draw(data, options);

		// create callback on window resize that will redraw the charts after
		// a small delay (so they are not re-drawn on every single pixel resize)
		var resizeTimeout = null;
		var redrawChart = function() {
			chart.draw(data, options);
		};
		$(window).resize(function() {
			if (resizeTimeout) {
				window.clearTimeout(resizeTimeout)
			}
			resizeTimeout = window.setTimeout(redrawChart, 250);
		});

	});
</script>
<div id="<?php echo $chartId; ?>" style="height: 100%;"></div>
