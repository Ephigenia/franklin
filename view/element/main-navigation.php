<nav id="main-navigation" class="navbar navbar-fixed">
	<a href="./" class="brand" title="go to home" rel="home">Franklin</a>
	<ul class="nav">
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
</nav>