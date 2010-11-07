<?php

require __DIR__.'/lib/Franklin.php';
$Franklin = new Franklin(__DIR__.'/config/config.php');
$Franklin->showReport();