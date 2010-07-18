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

class_exists('Test') or require dirname(__FILE__).'/Test.php';
class_exists('Pagerank') or require dirname(__FILE__).'/../network/Pagerank.php';

/**
 * 	Record Google Pagerank
 * 	
 * @package Franklin
 * @subpackage Franklin.Test
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 19.05.2009
 */
class GooglePageRankTest extends Test
{
	public function run()
	{
		$Pagerank = new Pagerank($this->TestGroup->host);
		$this->result = $Pagerank->getrank($this->TestGroup->host);
		return $this->result;
	}
}