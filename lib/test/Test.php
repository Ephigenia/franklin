<?php

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
	public $TestGroup;
	
	public $result;
	
	public function __construct(Config $config)
	{
		$this->config($config);
	}
	
	public function config(Array $config)
	{
		$this->name = __CLASS__;
		foreach($config as $k => $v) {
			$this->{$k} = $v;
		}
		return $this;
	}
	
	public function run()
	{
		return $this->result;
	}
}