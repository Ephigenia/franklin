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
 * A {@link Test} that gets the number of fans of a facebook group.
 * The group must be public and viable via the open graph protocol api
 * 	
 * @package Franklin
 * @subpackage Franklin.Test
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 2010-06-16
 */
class FacebookGroupFansCountTest extends ScrapeTest
{
	public function afterConstruct()
	{
		// id is okay too!
		$this->url = 'https://graph.facebook.com/'.urlencode($this->groupId); 
		$this->regexp = '@fan_count":\s(\d+)@i';
		return parent::afterConstruct();
	}
}