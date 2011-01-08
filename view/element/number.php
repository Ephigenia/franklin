<?php
$data = $Test->last(2);
$data = (float) reset($data);
if(strlen($data) <= 3) {
	$fontSize = 160;
} else {
	$fontSize = round(3 / strlen($data) * 160);
}
?>
<div class="number" style="font-size: <?php echo $fontSize; ?>px;"><?php echo $data ?></div>
<?php echo $this->element('lineChart', array('Test' => $Test))?>