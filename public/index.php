<?php

require __DIR__.'/../config/bootstrap.php';
$Franklin = new \Franklin\Franklin();
$Franklin->loadConfig(FRANKLIN_ROOT.'/config/config.php');
header('Content-Type: text/html; charset=utf-8');
echo $Franklin->report();