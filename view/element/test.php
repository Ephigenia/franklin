<!-- Test <?= substr(get_class($Test), 0, -4); ?> -->
<div class="Test">
	<!-- <h3><?= $Test->name; ?></h3> -->
	<div class="chart">
		<?php 
		// get last data from tests as array
		$data = $Test->last(48);
		$data = http_build_query($data);
		$data = str_replace('&', ',', $data);
		// get chart title from test’s name
		$title = $Test->name;
		// append interval time to test’s title
		if ($Test->interval > 3600) {
			$title .= ' (every '.round($Test->interval / 3600).'h)';
		} else {
			$title .= ' (every '.round($Test->interval / 60).'m)';
		}
		?>
		<img src="lib/chart/?title=<?= urlencode($title); ?>&amp;bgcolor=050505&amp;data=<?=$data;?>" alt="<?= $Test->name; ?>" />
	</div>
</div>
