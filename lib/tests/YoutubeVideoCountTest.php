<?php

/**
 * Franklin: <http://code.marceleichner.de/project/franklin>
 * Copyright 2009+, Ephigenia M. Eichner, Kopernikusstr. 8, 10245 Berlin
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 * @license		http://www.opensource.org/licenses/mit-license.php The MIT License
 * @copyright	copyright 2007+, Ephigenia M. Eichner
 * @link		http://code.ephigenia.de/projects/franklin/
 * @filesource
 */

class_exists('ScrapeTest') or require dirname(__FILE__).'/ScrapeTest.php';

/**
 * A {@link Test} that records view counts of video from Youtube
 *
 * @package Franklin
 * @subpackage Franklin.Test
 * @author Martin Fleck <m.fleck@extrajetzt.de>
 * @since 2010-10-28
 */
class YoutubeVideoCountTest extends ScrapeTest
{
	public function afterConstruct()
	{
		$this->url = 'http://www.youtube.com/watch?v='.$this->videoID;
		$this->regexp = '@<strong class="watch-view-count">(.*)</strong>@';
		return parent::afterConstruct();
	}
}