<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
    	</button>

		<a class="navbar-brand" href="./" rel="home">Franklin</a>
	</div>

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<?php foreach($groups as $i => $TestGroup) { ?>
			<li<?php
					if (isset($Test) && $Test->group == $TestGroup) {
						echo ' class="active"';
					}
				?>>
				<a href="./#group-<?= preg_replace('@[^a-z0-9]@i', '-', (string) $TestGroup); ?>"><?php
				echo $TestGroup;
				?></a>
			</li>
			<?php } ?>
		</ul>
	</div>
</nav>