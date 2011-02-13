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
 * A {@link Test} a that records properties (likes, plays) from a Youtube
 * video. Valid options for "property" are:
 * 
 * * viewCount
 * * rating
 * * likeCount
 * * ratingCount
 * * favoriteCount
 * 
 * http://gdata.youtube.com/feeds/api/videos?q=h7qUeZLv4d0&v=2&alt=jsonc
 *
 * @package Franklin
 * @subpackage Franklin.Test
 * @author Marcel Eichner // Ephigenia <love@ephigenia.de>
 * @since 2011-02-13
 */
class YoutubeVideoTest extends ScrapeTest
{
	public function afterConstruct()
	{
		$this->url = 'http://gdata.youtube.com/feeds/api/videos?q='.$this->videoID.'&v=2&alt=jsonc';
		$this->regexp = '@'.preg_quote($this->property, '@').'":\s*(\d+)@i';
		return parent::afterConstruct();
	}
}