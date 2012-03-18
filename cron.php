<?php

/**
 * Cron-Job-Script for Franklin
 * this should only be called by cronjobs
 * 	
 * see readme.txt file for installation instructions
 */

require __DIR__.'/config/bootstrap.php';
$Franklin = new \Franklin\Franklin();
$Franklin->loadConfig(FRANKLIN_ROOT.'/config/config.php');
$Franklin->cron();