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
 * 	@version		$Rev: 6 $
 * 	@modifiedby		$LastChangedBy: ephigenia $
 * 	@lastmodified	$Date: 2009-10-17 15:42:57 +0200 (Sat, 17 Oct 2009) $
 * 	@filesource		$HeadURL: https://ephigenia@franklin.svn.sourceforge.net/svnroot/franklin/trunc/lib/Franklin.php $
 */

class_exists('Object') or require dirname(__FILE__).'/Object.php';
class_exists('TestGroup') or require dirname(__FILE__).'/TestGroup.php';

define('DEBUG_PRODUCTION',	0);
define('DEBUG_DEBUG',		1);
define('DEBUG_VERBOSE',		2);

define('LF', chr(10));

/**
 * 	Franklin main application class
 * 
 * 	@version $Rev: 6 $
 * 	@lastchange $Date: 2009-10-17 15:42:57 +0200 (Sat, 17 Oct 2009) $ by $Author: ephigenia $
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 30.04.2009
 * @package Franklin
 */
class Franklin extends Object
{	
	const APPNAME	= 'Franklin';
	
	const APPVERSION	= '0.2a';
	
	public static $CLIMODE = false;
	
	public static $debug = DEBUG_VERBOSE;
	
	protected $TestGroups = array();

	public function __construct()
	{
		$this->setErrorReporting();
		self::$CLIMODE = !isset($_SERVER['SERVER_PORT']);
		$this->loadConfig(dirname(__FILE__).'/../config/config.php');
		
	}
	
	public function showReport()
	{
		class_exists('View') or require dirname(__FILE__).'/View.php';
		$view = new View('report', array('TestGroups' => $this->TestGroups));
		echo $view->render();
	}
	
	public function runTests()
	{
		$counters = array(
			'tests' => 0,
			'runs' => 0,
		);
		foreach($this->TestGroups as $TestGroup) foreach($TestGroup as $Test) {
			$counters['tests']++;
			if (empty($Test->lastTestTimestamp) || $Test->lastTestTimestamp + $Test->interval < time()) {
				$result = $Test->run();
				$Test->saveResult();
				$counters['runs']++;
			}
		}
		printf('%s tests checked, %s done, %s skipped.', $counters['tests'], $counters['runs'], $counters['tests'] - $counters['runs']);
	}
	
	protected function loadConfig($configFilename)
	{
		require $configFilename;
		if (isset($config['timezone'])) {
			date_default_timezone_set($config['timezone']);
		}
		foreach($config['groups'] as $groupConfig) {
			$TestGroup = new TestGroup($groupConfig['name'], $groupConfig['host']);
			// add tests to group
			foreach($groupConfig['tests'] as $testConfig) {
				$TestGroup->addTest($TestGroup->createTest($testConfig));
			}
			$this->TestGroups[] = $TestGroup;
		}
		return true;
	}
	
	protected function setErrorReporting()
	{
		if (self::$debug > DEBUG_PRODUCTION) {
			error_reporting(E_ALL + E_STRICT);
			ini_set('display_errors', 'yes');
			ini_set('display_startup_errors', 'yes');
		} else {
			error_reporting(0);
		}
		return true;
	}
}

class FranklinException extends BasicException {}
class FranklinConfigFileNotFoundException extends FranklinException {}