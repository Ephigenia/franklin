<?php
$data = $this->franklin->storage($Test)->getLatestValues(30);
?>

<h1><?php echo $Test->name ?></h1>
<div style="width: auto; height: 500px;">
	<?php echo $this->element('lineChart', array('Test' => $Test)); ?>
</div>
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