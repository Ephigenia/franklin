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
	public $TestGroup;
	
	protected $config = array(		
	);
	
	public $result;
	
	public function __construct(Config $config)
	{
		$this->config = $config;
		$this->afterConstruct();
	}
	
	protected function afterConstruct() {}
}