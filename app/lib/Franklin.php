<?php

/**
 * Franklin: <http://code.marceleichner.de/project/franklin>
 * Copyright 2009+, Ephigenia M. Eichner, Kopernikusstr. 8, 10245 Berlin
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 * @license		http://www.opensource.org/licenses/mit-license.php The MIT License
 * @copyright	copyright 2007+, Ephigenia M. Eichner
 * @link		http://code.ephigenia.de/projects/franklin/
 * @filesource
 */


require __DIR__.'/ConfigFile.php';
require __DIR__.'/TestGroup.php';

/**
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 30.04.2009
 * @package Franklin
 */
class Franklin
{
	const VERSION = '0.25';
	
	protected $testGroups = array();

	public function __construct(Config $Config)
	{
		$this->config = $Config;
		if ($this->config->timezone) {
			date_default_timezone_set($this->config->timezone);
		}
		foreach($this->config->groups as $config) {
			$TestGroup = new TestGroup($config['name'], new Config($config));
			foreach($config['tests'] as $testConfig) {
				$TestGroup->add($TestGroup->createTest($testConfig['test'], new Config($testConfig)));
			}
			$this->testGroups[] = $TestGroup;
		}
	}
	
	public function report()
	{
		class_exists('View') or require dirname(__FILE__).'/View.php';
		$view = new View('report', array(
			'TestGroups' => $this->testGroups,
			'theme' => $this->config->theme,
		));
		echo $view;
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
}