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
 * 	@version		$Rev: 4 $
 * 	@modifiedby		$LastChangedBy: ephigenia $
 * 	@lastmodified	$Date: 2009-06-19 12:33:30 +0200 (Fr, 19 Jun 2009) $
 * 	@filesource		$HeadURL: https://ephigenia@franklin.svn.sourceforge.net/svnroot/franklin/trunc/lib/tests/GoogleResultsCountTest.php $
 */

class_exists('ScrapeTest') or require dirname(__FILE__).'/ScrapeTest.php';

/**
 * A {@link Test} that records the Traffic Rank from amazon’s alexa.com
 * 	
 * @package Franklin
 * @subpackage Franklin.Test
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 2009-10-17
 */
class AlexaTrafficRankTest extends ScrapeTest
{	
	public function afterConstruct()
	{
		$this->url = 'http://www.alexa.com/search?r=site_site&q='.urlencode($this->TestGroup->host); 
		// optional country code to record
		if (!empty($this->countryCode)) {
			$this->regexp = '@'.strtoupper($this->countryCode).'<\/a>:\s+([\d,.]+)@is';
		} else {
			$this->regexp = '@trafficstats">\s+([\d,.]+)@i';
		}
		return parent::afterConstruct();
	}
}