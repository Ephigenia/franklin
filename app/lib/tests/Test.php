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
 * Abstract blueprint-like classs for Tests
 * 
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 30.04.2009
 * @package Franklin
 * @subpackage Franklin.tests
 */
abstract class Test
{	
	/**
	 * Stores the name of the test
	 * 	@var string
	 */
	public $name;
	
	/**
	 * 	Last occured error
	 * 	@var string
	 */
	public $error = false;
	
	/**
	 * Associated Testing Group
	 * 	@var TestGroup
	 */
	public $TestGroup;
	
	/**
	 * Result of the test, should be false or true after {@link run} was called
	 * 	@var boolean
	 */
	public $result = true;
	
	public $id;
	
	/**
	 * 	Default interval between recored values
	 * 	@var integer seconds
	 */
	public $interval = 60;
	
	/**
	 * Type of visualization of this test
	 */
	public $display = 'lineChart';
	
	/**
	 * Stores a timestamp when this test was performed the last time
	 * 	@var integer
	 */
	public $lastTestTimestamp;
	
	public function __construct(TestGroup $TestGroup, Array $config = array())
	{
		$this->TestGroup = $TestGroup;
		foreach($config as $k => $v) {
			// replace wildcards
			if (is_string($v)) {
				$v = strtr($v, array(
					'%host%' => $TestGroup->host,
					'%name%' => $TestGroup->name
				));
			}
			$this->$k = $v;
		}
		if (empty($this->name)) {
			$this->name = substr(get_class($this), 0, -4);
		}
		// read last test time from file
		if (is_string($this->interval)) {
			$this->interval = strtotime($this->interval, 0);
		}
		// generate unique id for this test
		unset($config['name'], $config['interval'], $config['display']);
		$this->id = substr(md5(implode('', $config)), 0, 10);
		// call after construct
		$this->afterConstruct();
		return $this;
	}

	public function afterConstruct()
	{
		$lastTestFilename = $this->filename('lasttest');
		if (file_exists($lastTestFilename)) {
			$this->lastTestTimestamp = (int) file_get_contents($lastTestFilename);
		}
		return true;
	}
	
	public function run()
	{
		return $this->result;
	}
	
	public function filename($suffix = null)
	{
		$filename = $this->TestGroup->host.'_'.$this->name;
		if ($suffix) {
			$filename .= '_'.$suffix;
		} else {
			$filename .= '_'.$this->id;
		}
		$filename .= '.txt';
		$filename = strtr($filename, array(
			' ' => '_',
			'ä' => 'ae', 'Ä' => 'AE', 'ü' => 'ue', 'Ü' => 'UE', 'ö' => 'oe', 'Ö' => 'oe',
			'ß' => 'ss'	,
			'(' => '', ')' => '',
			'™' => ''
		));
		$filename = preg_replace('@[^A-Za-z0-9.-_]@', '', $filename);
		return dirname(__FILE__).'/../../data/'.$filename;
	}
	
	public function saveResult()
	{
		$str = implode('|', array(date('Y-m-d H:i:s'), time(), $this->result));
		$fp = fopen($this->filename(), 'a+');
		fputs($fp, $str.LF);
		fclose($fp);
		file_put_contents($this->filename('lasttest'), time());
		return true;
	}
	
	public function last($count = 100)
	{
		if (!file_exists($this->filename())) {
			return array();
		}
		if (!$fp = fopen($this->filename(), 'r')) {
			return array();
		}
		$i = 1;
		while(!feof($fp)) {
			if ($i > $count) {
				array_shift($lines);
			}
			$line = fgets($fp, 512);
			if (!empty($line)) {
				$lines[] = $line;
				$i++;
			}
		}
		fclose($fp);
		$lines = array_map('trim', $lines);
		$r = array();
		foreach($lines as $k => $v) {
			$a = explode('|', $v);
			$r[$a[1]] = (int) $a[2];
		}
		return $r;
	}
}