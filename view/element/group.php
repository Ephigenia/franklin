<div class="group">
	<h1><?php echo $Group ?></h1>
	<ul class="tests">
	<?php
	foreach ($Group as $Test) {
		echo $this->element('test', array('Test' => $Test));
	}
	?>
	</ul>
</div>