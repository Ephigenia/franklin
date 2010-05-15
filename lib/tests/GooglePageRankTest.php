<?php

/**
 * 	Franklin: <http://franklin.sourecforge.net>
 * 	Copyright 2009+, Ephigenia M. Eichner, Kopernikusstr. 8, 10245 Berlin
 *
 * 	Licensed under The MIT License
 * 	Redistributions of files must retain the above copyright notice.
 * 	@license		http://www.opensource.org/licenses/mit-license.php The MIT License
 * 	@copyright	copyright 2007+, Ephigenia M. Eichner
 * 	@link			http://code.ephigenia.de/projects/franklin/
 * 	@version		$Rev: 7 $
 * 	@modifiedby		$LastChangedBy: ephigenia $
 * 	@lastmodified	$Date: 2009-10-21 15:23:30 +0200 (Mi, 21 Okt 2009) $
 * 	@filesource		$HeadURL: https://ephigenia@franklin.svn.sourceforge.net/svnroot/franklin/trunc/lib/tests/GooglePageRankTest.php $
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
	public function run() {
		$Pagerank = new Pagerank($this->TestGroup->host);
		$this->result = $Pagerank->getrank($this->TestGroup->host);
		return $this->result;
	}
	
} // END GooglePageRankTest class