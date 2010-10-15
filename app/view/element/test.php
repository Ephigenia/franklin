<?php
// get chart title from test’s name
$title = $Test->name;
// append interval time to test’s title
if ($Test->interval > 3600) {
	$title .= ' (every '.round($Test->interval / 3600).'h)';
} else {
	$title .= ' (every '.round($Test->interval / 60).'m)';
}
?>
<li class="Test <?php echo $Test->display; ?>">
	<h2><?php echo $title ?></h2>
	<?php echo $this->element($Test->display, array('Test' => $Test)); ?>
</li>