<?php
$data = $this->franklin->storage($Test)->getLatestValues(30);
foreach($data as $index => $line) {
	$data[$index] = array(
		$line[0]->format('c'),
		$line[1],
	);
}

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
		data.addRows(chartData);
		var options = {
			strictFirstColumnType: false,
			titlePosition: 'none',
			lineWidth: 2,
			pointSize: 3,
			legend: {
				position: 'none'
			}
		};
		var chart = new google.visualization.LineChart(document.getElementById('chart-<?php echo $Test->uniqueId(); ?>'));
		chart.draw(data, options);
	});
</script>
<div class="chart line-chart" id="chart-<?php echo $Test->uniqueId(); ?>" style="width: 100%; height: 100%;"></div>
