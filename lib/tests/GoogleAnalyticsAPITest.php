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

/**
 * http://code.google.com/p/gapi-google-analytics-php-interface/
 * 	
 * @package Franklin
 * @subpackage Franklin.Test
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 2009-10-13
 */
class GoogleAnalyticsAPITest extends Test
{
	public $time = '1 day';
	
	public function run()
	{
		class_exists('gapi') or require dirname(__FILE__).'/../vendor/gapi/gapi.class.php';
		$ga = new gapi($this->email, $this->password);
		$ga->requestReportData($this->profile_id,
			array('date'),
			array($this->metric),
			null,
			null,
			date('Y-m-d', strtotime('yesterday')),
			date('Y-m-d', strtotime('-'.$this->time))
		);
		$methodName = 'get'.ucFirst($this->metric);
		$this->result = $ga->$methodName();
		return parent::afterConstruct();
	}
}