<div class="container">
	<div class="page-header">
		<h1><?php
			printf('%s / %s', 
				$Test->group,
				$Test->name
			);
		?></h1>
	</div>
	<div class="row">
		<div class="col-md-12" style="height: 500px;">
			<?php
				$data = $this->franklin->storage($Test)->getLatestValues(30);
				echo $this->element('lineChart', array(
					'Test' => $Test,
					'lineWidth' => 5,
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