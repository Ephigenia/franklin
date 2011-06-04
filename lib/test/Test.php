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
		$this->init();
	}
	
	public function init()
	{
		return true;
	}
	
	public function beforeRun()
	{
		$this->config->validate();
		return true;
	}
	
	public function run()
	{
		$this->beforeRun();
		return true;
	}
}