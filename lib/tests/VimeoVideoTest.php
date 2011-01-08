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
 * A {@link Test} A that records properties (likes, plays, comments) from Vimeo
 *
 * @package Franklin
 * @subpackage Franklin.Test
 * @author Martin Fleck <m.fleck@extrajetzt.de>
 * @since 2010-10-19
 */
class VimeoVideoTest extends ScrapeTest
{
	public function afterConstruct()
	{
		$this->url = 'http://vimeo.com/api/v2/video/'.$this->videoID.'.xml';
		$this->regexp = '@<'.preg_quote($this->property, '@').'>(.*)</'.preg_quote($this->property, '@').'>@';
		return parent::afterConstruct();
	}
}