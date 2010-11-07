<?php

/**
 * This is the main franling application caller file that creates
 * an instance of Franklin and shows the report.
 *
 * !!! Do not set this file as your cronjob !!!
 * 
 * see README.md file for installation and setup instructions
 */

require __DIR__.'/../app/bootstrap.php';
$Franklin = new Franklin(
	new ConfigFile(__DIR__.'/../app/config/config.php')
);
$Franklin->report();