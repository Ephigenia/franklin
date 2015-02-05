<div class="row">
	<?php
	foreach($groups as $Group) {
		echo $this->element('group', array('Group' => $Group));
	}
	?>
</div>