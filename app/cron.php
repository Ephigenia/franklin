<?php

/**
 * Cron-Job-Script for Franklin
 * this should only be called by cronjobs
 * 	
 * see readme.txt file for installation instructions
 */
require_once dirname(__FILE__).'/lib/Franklin.php';
$app = new Franklin();
$app->runTests();