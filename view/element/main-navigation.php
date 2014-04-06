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
			<?php 
			
			// only show the first 4 groups and the rest as a dropdown
			// if there are to many options
			$maxShownGroupsCount = 4;
			$firstGroups = array_slice($groups, 0, $maxShownGroupsCount - 1);
			$dropdownGroups = array_slice($groups, $maxShownGroupsCount - 1);

			foreach($firstGroups as $TestGroup) { 
				echo $this->element('groupMenuItem', array(
					'TestGroup' => $TestGroup,
				));
			}

			// show remaining groups
			if (!empty($dropdownGroups)) { ?>

			<li class="dropdown">
        		<a href="#" class="dropdown-toggle" data-toggle="dropdown">mehr … <b class="caret"></b></a>
        		<ul class="dropdown-menu">
        		<?php
        		foreach($dropdownGroups as $TestGroup) {
        			echo $this->element('groupMenuItem', array(
						'TestGroup' => $TestGroup,
					));
        		} ?>
        		</ul>
        	</li>

			<?php } ?>
		</ul>
	</div>
</nav>