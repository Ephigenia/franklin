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
 * A {@link Test} that records the number of readers of a feedburner rss-feed.
 * 	
 * @package Franklin
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 19.05.2009
 */
class FeedburnerReadersTest extends ScrapeTest
{	
	public function afterConstruct()
	{
		$params = array(
			'uri' => $this->uri,
			// we have to access data that is 2 days old, 1 day old is sometimes and often just 0!!
			'dates' => date('Y-m-d', strtotime('-2 days')).','.date('Y-m-d', strtotime('-2 days')),
		);
		$this->url = 'https://feedburner.google.com/api/awareness/1.0/GetFeedData?'.http_build_query($params, '', '&');
		$this->regexp = '@circulation="(\d+)"@i';
		return parent::afterConstruct();
	}
}