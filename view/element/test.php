<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
	<h3>
		<a href="?action=test&amp;id=<?php echo $Test->uniqueId(); ?>" title="details">
            <?php echo $Test->name ?>
        </a>
	</h3>
	<?php echo $this->element('lineChart', array('Test' => $Test)); ?>
</div>