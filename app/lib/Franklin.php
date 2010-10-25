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

class_exists('Object') or require dirname(__FILE__).'/Object.php';
class_exists('TestGroup') or require dirname(__FILE__).'/TestGroup.php';
class_exists('Log') or require dirname(__FILE__).'/Log.php';

define('DEBUG_PRODUCTION',	0);
define('DEBUG_DEBUG', 1);
define('DEBUG_VERBOSE',	2);

define('LF', chr(10));

/**
 * Franklin main application class
 * 
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 30.04.2009
 * @package Franklin
 */
class Franklin extends Object
{	
	const APPNAME = 'Franklin';
	
	const APPVERSION = '0.21';
	
	const DEFAULTTHEME = 'light';
	
	public static $CLIMODE = false;
	
	public static $debug = DEBUG_VERBOSE;
	
	protected $TestGroups = array();
	
	protected $themeFilename = 'light';

	public function __construct()
	{
		$this->setErrorReporting();
		self::$CLIMODE = !isset($_SERVER['SERVER_PORT']);
		$this->loadConfig(dirname(__FILE__).'/../config/config.php');
	}
	
	public function showReport()
	{
		class_exists('View') or require dirname(__FILE__).'/View.php';
		$view = new View('report', array('TestGroups' => $this->TestGroups, 'themeFilename' => $this->themeFilename));
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
				Log::write(DEBUG_DEBUG, $Test->name.' result: '.var_export($Test->result, true));
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
		if (isset($config['theme'])) {
			$theme = str_replace('@[^A-Za-z0-9-_]+@', '', $config['theme']);
			$themeFile = dirname(__FILE__).'/../theme/'.$theme.'.php';
			if (file_exists($themeFile)) {
				$this->themeFilename = $themeFile;
			} else {
				$this->themeFilename = dirname(__FILE__).'/../theme/'.self::DEFAULTTHEME.'.php';
			}
		} else {
				$this->themeFilename = dirname(__FILE__).'/../theme/'.self::DEFAULTTHEME.'.php';
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
		Log::$level = self::$debug;
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
