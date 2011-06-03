<?php

namespace Franklin\test;

class AbstractTest implements Test
{
	public $config;
	
	public function __construct(\Franklin\test\Config $config)
	{
		$this->configure($config);
	}
	
	public function configure(\Franklin\test\Config $config)
	{
		$this->config = $config;
		return $this;
	}
	
	public function run()
	{
		return true;
	}
}