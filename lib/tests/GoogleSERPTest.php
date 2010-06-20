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

class_exists('ScrapeTest') or require dirname(__FILE__).'/ScrapeTest.php';

/**
 * This Test will search for a query on google and try to tell you’re position
 * on this search searching in the result for the hostname of your testgroup.
 * See Google Search API http://code.google.com/intl/de-DE/apis/ajaxsearch/documentation/reference.html#_restUrlBase
 * 	
 * @package Franklin
 * @subpackage Franklin.Test
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 2010-06-20
 */
class GoogleSERPTest extends ScrapeTest
{	
	public $language = false;
	
	public $country = true;
	
	public $save = false;
	
	public function afterConstruct() {
		$this->name = sprintf('SERP "%s"', $this->search);
		return parent::afterConstruct();
	}
	
	public function run()
	{
		// Google Search API default parameters
		$baseURL = 'http://ajax.googleapis.com/ajax/services/search/web?';
		$defaultParams = array(
			'v' => '1.0',
			'rsz' => 'large',
			'q' => $this->search,
		);
		if (!empty($this->save)) {
			$defaultParams['save'] = $this->save;
		}
		if (!empty($this->language)) {
			$defaultParams['hl'] = $this->language;
		}
		if (!empty($this->country)) {
			if ($this->country === true) {
				if (!empty($this->language)) $defaultParams['gl'] = $this->language;				
			} else {
				$defaultParams['gl'] = $this->country;
			}
		}
		
		// iterate over pages and try to find match with host
		$perPage = 8;
		$this->result = false;
		for($p = 0; $p < 7; $p++) {
			$start = $p * $perPage;
			// build request url
			$url = $baseURL.http_build_query($defaultParams).'&start='.$start;
			$response = Scraper::scrape($url);
			if (!is_string($response)) {
				continue;
			}
			$response = json_decode($response);
			// try to find result set
			if (!is_object($response)) continue;
			if (!isset($response->responseData->results)) continue;
			// find hostname in result set
			foreach($response->responseData->results as $index => $result) {
				if (!preg_match('/'.preg_quote($this->TestGroup->host, '/').'.*/', $result->url)) continue;
				$this->result = $start + $index + 1;
				break 2;
			}
		}
		return $this->result;
	}
}