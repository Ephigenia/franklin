<?php

/**
 * Franklin: <http://code.marceleichner.de/project/franklin>
 * Copyright 2007+, Ephigenia M. Eichner, Kopernikusstr. 8, 10245 Berlin
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 * @license		http://www.opensource.org/licenses/mit-license.php The MIT License
 * @copyright	copyright 2007+, Ephigenia M. Eichner
 * @link		http://code.ephigenia.de/projects/franklin/
 */

/**
 * @package Franklin
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 19.05.2009
 */
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