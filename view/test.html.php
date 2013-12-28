<div class="container">
	<div class="page-header">
		<h1><?php
			printf('%s / %s', 
				$Test->group,
				$Test->name
			);
		?></h1>
	</div>
	<div class="row" style="height: 500px;">
	<?php
		$data = $this->franklin->storage($Test)->getLatestValues(30);
		echo $this->element('lineChart', array(
			'Test' => $Test,
			'lineWidth' => 5,
		));
	?>
	</div>
	<div class="row">
		<table class="table striped bordered">
			<thead>
				<tr>
					<th>Date</th>
					<th>Value</th>
					<th>Delta</th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($data as $index => $line) {
				$delta = 0;
				$date = $line[0];
				$value = $line[1];
				if ($index > 0) {
					$delta = $data[$index-1][1] - $value;
				}
				?>
				<tr>
					<td><?php echo $date->format('Y-m-d H:i'); ?></td>
					<td><?php echo $value; ?></td>
					<td><?php echo $delta; ?></td>
				</tr>
				<?php
			} ?>
			</tbody>
		</table>
	</div>
</div>