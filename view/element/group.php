<div class="group" id="group-<?= preg_replace('@[^a-z0-9]@i', '-', (string) $Group); ?>">
	<h1><?php echo $Group ?></h1>
	<ul class="tests">
	<?php
	foreach ($Group as $Test) {
		echo $this->element('test', array('Test' => $Test));
	}
	?>
	</ul>
</div>