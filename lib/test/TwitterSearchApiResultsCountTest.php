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
 * This test uses the [Twitter Search API](http://apiwiki.twitter.com/Twitter-Search-API-Method%3A-search) to search
 * the twitter site for a specific query (`q`). You can limit the results by date
 * (`since`) or location (`locale`, `geocode`). The test will always record the
 * number of results found.
 * 
 * @package Franklin
 * @subpackage Franklin.Test
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 2010-10-14
 */
class TwitterSearchApiResultsCountTest extends Test
{
	public $url = '';
	
	public function run()
	{
		$params = array(
			'q' => $this->q,
			'page' => 1,
			'rpp' => 100,
		);
		if (!empty($this->since)) {
			$params['since'] = date('Y-m-d', strtotime($this->since));
		}
		if (!empty($this->locale)) {
			$params['locale'] = $this->locale;
		}
		if (!empty($this->geocode)) {
			$params['geocode'] = $this->geocode;
		}
		for ($i = 1; $i < 10; $i++) {
			$params['page'] = $i;
			$this->url = 'http://search.twitter.com/search.json?'.http_build_query($params, '', '&');
			$response = Scraper::scrape($this->url);
			if ($json = json_decode($response)) {
				if (isset($json->total)) {
					$this->result = $json->total;
					break;
				}
			}
		}
		return $this->result;
	}
}