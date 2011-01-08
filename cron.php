<?php

/**
 * Cron-Job-Script for Franklin
 * this should only be called by cronjobs
 * 	
 * see readme.txt file for installation instructions
 */

require __DIR__.'bootstrap.php';
$Franklin = new Franklin(__DIR__.'/config/config.php');
$Franklin->cron();