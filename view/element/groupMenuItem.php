<li<?php
	if (isset($Test) && $Test->group == $TestGroup) {
			echo ' class="active"';
		}
	?>>
	<a href="./#group-<?= preg_replace('@[^a-z0-9]@i', '-', (string) $TestGroup); ?>"><?php
	echo $TestGroup;
	?></a>
</li>