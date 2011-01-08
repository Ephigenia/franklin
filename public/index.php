<?php

require __DIR__.'/../app/bootstrap.php';
$Franklin = new Franklin(
	new ConfigFile(__DIR__.'/../app/config/config.php')
);
$Franklin->report();