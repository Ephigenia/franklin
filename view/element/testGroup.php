<div class="TestGroup">
	<h2><?php echo $TestGroup->name ?> (<?php echo $TestGroup->host ?>)</h2>
	<div class="Tests">
		<?php
		foreach($TestGroup as $Test) {
			echo $this->renderElement('test', array('Test' => $Test));
		}
		?>
	</div>
</div>
