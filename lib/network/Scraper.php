<?php

namespace Franklin\network;

/**
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 30.04.2009
 * @package Franklin
 * @subpackage Franklin.Network
 */
class Scraper extends \Franklin\network\CURL
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