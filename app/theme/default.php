<?php

class DefaultTheme
{
	public $chartSize = array(
		'275',
		'135',
	);
	
	public $point = '000000';
	
	public $text = '30303F';
	
	public $grid = '30303F';
	
	public $line = '6C6C6C';
}

if (basename($_SERVER['PHP_SELF']) == 'index.php') {
	class Theme extends DefaultTheme {};
}