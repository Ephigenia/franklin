<?php

namespace Franklin\test;

interface Test
{
	public function __construct(\Franklin\test\Config $config);
	
	public function configure(\Franklin\test\Config $config);
	
	public function run();
}