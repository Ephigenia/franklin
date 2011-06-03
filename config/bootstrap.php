<?php

namespace Franklin;

define('FRANKLIN_ROOT', realpath(__DIR__.'/../'));

require FRANKLIN_ROOT.'/lib/Library.php';
Library::add('Franklin', FRANKLIN_ROOT.'/lib/');