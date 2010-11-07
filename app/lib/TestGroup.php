<?php

/**
 * Franklin: <http://code.marceleichner.de/project/franklin>
 * Copyright 2009+, Ephigenia M. Eichner, Kopernikusstr. 8, 10245 Berlin
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 * @license		http://www.opensource.org/licenses/mit-license.php The MIT License
 * @copyright	copyright 2007+, Ephigenia M. Eichner
 * @link			http://code.ephigenia.de/projects/franklin/
 * @filesource
 */

/**
 * 	Test-Group Class
 * 
 * 	This class will collect different {@link Tests}
 * 	
 * @package Franklin
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 19.05.2009
 */
class TestGroup implements Countable, Iterator
{
	/**
	 * name of testing group
	 * @var unknown_type
	 */
	public $name;
	
	/**
	 * name of the host this testgroup is for
	 * @var unknown_type
	 */
	public $host;
	
	/**
	 * Storage for all tests assigned to this {@link TestGroup}
	 * @var unknown_type
	 */
	protected $tests = array();
	
	public function __construct($name, $host)
	{
		$this->name = $name;
		$this->host = $host;
	}
	
	public function addTest(Test $test)
	{
		$this->tests[] = $test;
		return $this;
	}
	
	public function createTest(Array $config = array())
	{
		// load test class if not allready loaded
		$classname = $config['test'].'Test';
		if (!class_exists($classname)) {
			$filename = dirname(__FILE__).'/tests/'.$classname.'.php';
			if (!file_exists($filename)) {
				throw new TestFileNotFoundException($classname, $filename);
			}
			require $filename;
		}
		if (!class_exists($classname)) {
			throw new TestClassNotLoadedException($classname, $filename);
		}
		// specific test config passed?
		if (!isset($config['config'])) {
			$config['config'] = array();
		}
		return new $classname($this, $config['config']);
	}
	
	public function key()
	{
		return key($this->tests);
	}
	
	public function current()
	{
		return current($this->tests);
	}
	
	public function count()
	{
		return count($this->tests);
	}
	
	public function next()
	{
		return next($this->tests);
	}
	
	public function rewind()
	{
		return reset($this->tests);
	}
	
	public function valid()
	{
		return FALSE !== $this->current();
	}
}

/**
 * @package Franklin
 * @subpackage Franklin.exception
 */
class TestGroupException extends Exception {}

/**
 * @package Franklin
 * @subpackage Franklin.exception
 */
class TestFileNotFoundException extends TestGroupException
{
	public function __construct($classname, $filename)
	{
		return parent::__construct(sprintf('%s Test file not found: "%s".', $classname, $filename));
	}
}

/**
 * @package Franklin
 * @subpackage Franklin.exception
 */
class TestClassNotLoadedException extends TestGroupException
{
	public function __construct($classname, $filename)
	{
		return parent::__construct(sprintf('%s class not found in file: "%s".', $classname, $filename));
	}
}