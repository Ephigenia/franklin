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

class_exists('CURL') or require dirname(__FILE__).'/CURL.php';

/**
 * 	Class that loads webpages and returns the content
 * 	
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 30.04.2009
 * @package Franklin
 * @subpackage Franklin.Network
 */
class Scraper extends CURL
{	
	public function read($url = null)
	{
		$this->url = is_null($url) ? $this->url : $url;
		$this->followLocation = true;
		return $this->exec(true, false);
	}
	
	public static function scrape($url = null)
	{
		$s = new Scraper($url);
		return $s->read();
	}
}