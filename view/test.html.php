<?php
$daysOptions = array(
	3065 => 'All-Time',
	30 => '30 Days',
	60 => '60 Days',
	90 => '90 Days',
	180 => '180 Days',
	365 => '1 Year',
);
?>
<div class="container">
	<div class="page-header">
		<div class="btn-group pull-right">
		<?php
			foreach ($daysOptions as $value => $label) {
				$uri = '?action=test&amp;id='.$Test->uniqueId().'&amp;days='.$value;
				?>
				<a href="<?php echo $uri; ?>" class="btn btn-default"><?php echo $label ?></a>
		<?php } ?>
		</div>
		<h1>
		<?php
			printf('%s / %s', 
				$Test->group,
				$Test->name
			);
		?>
		</h1>
	</div>
	<div class="row">
		<div class="col-md-12" style="height: 500px;">
			<?php
				$data = $this->franklin->storage($Test)->getLatestValues($days);
				echo $this->element('lineChart', array(
					'Test' => $Test,
					'lineWidth' => 5,
					'days' => $days,
				));
			?>
		</div>
	</div>
	
	<table class="table striped bordered">
		<thead>
			<tr>
				<th>Date</th>
				<th>Value</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$data = array_reverse($data);
		foreach($data as $index => $line) {
			$delta = 0;
			$date = $line[0];
			$value = $line[1];
			if ($index < count($data) - 1) {
				$delta = $value - $data[$index+1][1];
			}
			?>
			<tr>
				<td>
					<time datetime="<?php echo $date->format('c') ?>">
						<?php echo $date->format('Y-m-d H:i'); ?>
					</time>
				</td>
				<td>
					<?php
					echo $value;

					if ($delta != 0) {
						if ($delta > 0) {
							$format = ' <span class="asc"><i class="fa fa-long-arrow-up"></i> %+d</span>';
						} else {
							$format = ' <span class="desc"><i class="fa fa-long-arrow-down"></i> %+d</span>';
						}
						printf($format, $delta);
					}

					?>
				</td>
			</tr>
			<?php
		} ?>
		</tbody>
	</table>
	
</div>