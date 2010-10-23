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
class_exists('Scraper') or require dirname(__FILE__).'/../network/Scraper.php';

/**
 * A test that searches for values (using a regular expression) in a http
 * response.
 * This is used as a basis-class for {@link FeedburnerHitsTest}, {@link FeedburnerReadersTest}
 * or {@link GoogleResultsCountTest}.
 * 	
 * @package Franklin
 * @subpackage Franklin.Test
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 19.05.2009
 */
class ScrapeTest extends Test
{
	/**
	 * Target URL
	 * @var string
	 */
	public $url;
	
	/**
	 * Regular Expression that is used to extract the desired result from
	 * the source. Include the delimeters.
	 * @var string
	 */
	public $regexp;
	
	public function run()
	{
		$response = Scraper::scrape($this->url);
		if (preg_match_all($this->regexp, $response, $found)) {
			if (isset($found['match'])) {
				$this->result = $found['match'][0];
			} else {
				$this->result = $found[1][0];
			}
			$this->result = preg_replace('@[.,]@', '', $this->result);
			// type conversion
			if (preg_match('@^-?\s?\d+$@', $this->result)) {
				$this->result = (float) $this->result;
			}
		}
		die(var_dump($this->result));
		return $this->result;
	}
}