<?php

class_exists('ScrapeTest') or require dirname(__FILE__).'/ScrapeTest.php';

/**
 * A {@link Test} that records the Traffic Rank from amazon’s alexa.com
 * 	
 * @package Franklin
 * @subpackage Franklin.Test
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 2009-10-17
 */
class AlexaTrafficRankTest extends ScrapeTest
{
	public function afterConstruct()
	{
		$this->url = 'http://www.alexa.com/search?r=site_site&q='.urlencode($this->TestGroup->host); 
		// optional country code to record
		if (!empty($this->countryCode)) {
			$this->regexp = '@'.strtoupper($this->countryCode).'<\/a>:\s+([\d,.]+)@is';
		} else {
			$this->regexp = '@trafficstats">\s+([\d,.]+)@i';
		}
		return parent::afterConstruct();
	}
}