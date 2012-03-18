<?php

define('FRANKLIN_ROOT', realpath(__DIR__.'/../'));

require FRANKLIN_ROOT.'/lib/franklin/ClassLoader.php';
$ClassLoader = new Franklin\ClassLoader(array(
	'Franklin' => FRANKLIN_ROOT.'/lib/franklin',
));
$ClassLoader->registerAutoLoader();
