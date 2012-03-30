<?php

namespace Franklin;

/**
 * Container for Tests
 * @author Marcel Eichner // Ephigenia <love@ephigenia.de>
 */
class Group extends \ArrayObject
{
	protected $name;

	protected $config;
	
	public function __construct($name, $config)
	{
		$this->name = $name;
		$this->config = $config;
		if (isset($this->config['tests'])) foreach($this->config['tests'] as $testConfig) {
			$namespace = 'Franklin\\test\\'.$testConfig['test'];
			$classname = substr(strrchr($namespace, '\\'), 1);
			$classpath = $namespace.'\\'.$classname;
			$configClassPath = $namespace.'\\Config';
			if (isset($testConfig['config'])) {
				$Config = new $configClassPath($testConfig['config']);
			} else {
				$Config = new $configClassPath();
			}
			$this[] = new $classpath($Config);
		}
		return parent::__construct();
	}
	
	public function add(\Franklin\test\Test $test)
	{
		$test->group = $this;
		return parent::offsetSet(null, $test);
	}
	
	public function offsetSet($offset, $test)
	{
		return $this->add($test);
	}
	
	public function __toString()
	{
		return $this->name;
	}
}