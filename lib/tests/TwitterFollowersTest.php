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
 * A {@link Test} that records the number of followers of a twitter user
 * 	
 * @package Franklin
 * @subpackage Franklin.Test
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 2009-10-13
 */
class TwitterFollowersTest extends ScrapeTest
{	
	public function afterConstruct()
	{
		$this->url = 'http://www.twitter.com/'.urlencode($this->username); 
		$this->regexp = '@id="follower_count" class="stats_count numeric">([\d+.,]+)\s*</span>@i';
		return parent::afterConstruct();
	}
}