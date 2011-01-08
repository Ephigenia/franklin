<div class="TestGroup">
	<h1><?php echo $TestGroup->name ?> (<?php echo $TestGroup->host ?>)</h1>
	<ul class="Tests">
		<?php
		foreach($TestGroup as $Test) {
			echo $this->element('test', array('Test' => $Test));
		}
		?>
	</ul>
</div>
