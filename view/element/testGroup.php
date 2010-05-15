<!-- TestGroup -->
<div class="TestGroup">
	<h2 class="name"><?= $TestGroup->name ?></h2>
	<div class="Tests">
		<?php
		foreach($TestGroup as $Test) {
			echo $this->renderElement('test', array('Test' => $Test));
		}
		?>
	</div>
</div>
