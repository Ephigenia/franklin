<?php

namespace Franklin;

class Group
{
	protected $name;

	protected $tests = array();
	
	protected $config;
	
	public function __construct($name, $config)
	{
		$this->name = $name;
		$this->config = $config;
	}
	
	public function add(Test $test)
	{
		$test->group = $this;
		$this->tests[] = $test;
		return $this;
	}
}