<?php
$data = $this->franklin->storage($Test)->getLatestValues(2);
$data = $data[0][1];
if(strlen($data) <= 3) {
	$fontSize = 160;
} else {
	$fontSize = round(3 / strlen($data) * 160);
}
?>
<div class="number" style="font-size: <?php echo $fontSize; ?>px;"><?php echo $data ?></div>