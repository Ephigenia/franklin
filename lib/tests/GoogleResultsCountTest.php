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
 * 	A {@link Test} that records the number of results found by google for 
 * 	a query.
 * 	This can be used to record the indexed pages by site:%host% or the inbound
 * 	links with link:%host% for example.
 * 	
 * @package Franklin
 * @subpackage Franklin.Test
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 19.05.2009
 */
class GoogleResultsCountTest extends ScrapeTest
{	
	public function afterConstruct()
	{
		$this->url = 'http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q='.urlencode($this->search); 
		$this->regexp = '@estimatedResultCount":"([^"]+)"@i';
		return parent::afterConstruct();
	}
}