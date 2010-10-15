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

class_exists('Test') or require dirname(__FILE__).'/Test.php';
class_exists('Ping') or require dirname(__FILE__).'/../network/Ping.php';

/**
 * A rather simple {@link Test} that records the miliseconds that a hosts
 * takes to respond with a pong signal.
 * 
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 30.04.2009
 * @package Franklin
 * @subpackage Franklin.tests
 */
class PingTest extends Test
{	
	/**
	 * @var Ping
	 */
	public $ping;
	
	public $config = array(
		'max' => 500,
	);
	
	public function afterConstruct()
	{
		$this->ping = new Ping('http://'.$this->TestGroup->host, 1000);
		return parent::afterConstruct();
	}

	public function run()
	{
		$this->result = $this->ping->run();
		if ($this->result > $this->config['max']) {
			$this->error = 'Maximum ping reached: '.$this->result.'/'.$this->config['max'];
		}
		return parent::run();
	}
}