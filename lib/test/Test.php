<?php

namespace Franklin\test;

/**
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 30.04.2009
 * @package Franklin
 * @subpackage Franklin.tests
 */
abstract class Test
{
	public $TestGroup;
	
	public $result;
	
	public $config = array();
	
	public function __construct(Array $config = array())
	{
		$this->config += $config;
	}
	
	public function run()
	{
		return $this->result;
	}
}