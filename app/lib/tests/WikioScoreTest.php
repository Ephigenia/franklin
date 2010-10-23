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
 * Test for scraping the score from wikio.de
 * 	
 * @package Franklin
 * @subpackage Franklin.Test
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 2010-10-23
 */
class WikioScoreTest extends ScrapeTest
{
	public $display = 'number';
	
	public function afterConstruct()
	{
		$this->url = 'http://www.wikio.de/sources/'.$this->uri;
		$this->regexp = '@wikio-score:[^\d]+([0-9.]+)@is';
		return parent::afterConstruct();
	}
}