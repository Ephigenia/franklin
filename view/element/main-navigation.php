<div id="main-navigation" class="navbar navbar-fixed">
	<a href="./" class="brand" title="go to home" rel="home">Franklin</a>
	<nav class="responsive">
		<ul>
			<?php foreach($groups as $i => $TestGroup) { ?>
			<li>
				<a<?php
					if (isset($Test) && $Test->group == $TestGroup) {
						echo ' class="current"';
					}
				?> href="./#group-<?= preg_replace('@[^a-z0-9]@i', '-', (string) $TestGroup); ?>"><?php
				echo $TestGroup;
				?></a>
			</li>
			<?php } ?>
		</ul>
		<select size="1" name="main-navigation-select">
			<?php foreach($groups as $i => $TestGroup) { ?>
			<option value="./#group-<?= preg_replace('@[^a-z0-9]@i', '-', (string) $TestGroup); ?>"><?= $TestGroup ?></option>
			<?php } ?>
		</select>
	</nav>
</div>