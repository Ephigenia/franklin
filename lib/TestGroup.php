<?php

class TestGroup
{
	public $name;
		
	protected $tests = array();
	
	protected $config;
	
	public function __construct($name, Config $config)
	{
		$this->name = $name;
		$this->config = $config;
	}
	
	public function createTest($name, Config $config)
	{
		$classname = $name.'Test';
		if (!class_exists($classname)) {
			require __DIR__.'/tests/'.$classname.'.php';
		}
		return new $classname($config);
	}
	
	public function add(Test $test)
	{
		$test->TestGroup = $this;
		$this->tests[] = $test;
		return $this;
	}
}