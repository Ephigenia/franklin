<article class="group">
	<h1><?= $Group ?></h1>
	<?php foreach ($Group as $Test) {
		$storage = $this->franklin->storage($Test);
		echo $Test;
	}?>
</article>