<?php

require __DIR__.'/../config/bootstrap.php';
$Franklin = new \Franklin\Franklin();
$Franklin->loadConfig(FRANKLIN_ROOT.'/config/config.php');
echo $Franklin->report();