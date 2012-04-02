<form action="./" method="get" accept-charset="utf-8">
	<fieldset>
		<input type="hidden" name="p" value="compare" />
		<input type="submit" name="submit" value="compare selected" />
		<?php
		foreach($groups as $Group) {
			echo $this->element('group', array('Group' => $Group));
		}
		?>
	</fieldset>
</form>