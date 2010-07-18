<?php

/**
 * This is the main franling application caller file that creates
 * an instance of Franklin and shows the report.
 *
 * !!! Do not set this file as your cronjob !!!
 * 
 * see README.md file for installation and setup instructions
 */

require_once dirname(__FILE__).'/lib/Franklin.php';
$app = new Franklin();
$app->showReport();