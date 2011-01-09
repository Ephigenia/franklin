<?php

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
	public $config = array(
		'url' => null,
		'regexp' => null
	);
	
	public function run()
	{
		$response = Scraper::scrape($this->config->url);
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
		return $this->result;
	}
}