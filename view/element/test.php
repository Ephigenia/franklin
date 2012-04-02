<li class="test">
	<h2>
		<input type="checkbox" name="ids[]" value="<?php echo $Test->uniqueId(); ?>" id="compare-checkbox-<?php echo $Test->uniqueId(); ?>" />
		<a href="?action=test&amp;id=<?php echo $Test->uniqueId(); ?>" title="details"><?php echo $Test->name ?></a>
	</h2>
	<?php echo $this->element('lineChart', array('Test' => $Test)); ?>
</li>