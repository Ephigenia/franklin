<?php

namespace Franklin\test;

use 
	Franklin\test\config\Config
	;
	
class Test
{
	public $config;
	
	public function __construct(Config $config)
	{
		$this->config = $config;
	}
	
	public function run()
	{
		$this->config->validate();
		return true;
	}
}