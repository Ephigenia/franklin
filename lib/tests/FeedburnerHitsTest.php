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
 * 	A {@link Test} that records the Hits from feedburner accounts
 * 	please check that you have turned on the awareness API in your feedburner
 * 	account
 * 	
 * 	{@link http://code.google.com/intl/de-DE/apis/feedburner/awareness_api.html}
 * 	
 * @package Franklin
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 19.05.2009
 */
class FeedburnerHitsTest extends ScrapeTest
{	
	public function afterConstruct() {
		$this->url = 'https://feedburner.google.com/api/awareness/1.0/GetFeedData?uri='.urlencode($this->uri); 
		$this->regexp = '@hits="(\d+)"@i';
		return parent::afterConstruct();
	}
	
} // END FeedburnerHitsTest class