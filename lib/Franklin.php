<?php

namespace Franklin;

class Franklin
{
	const VERSION = '0.3';
	
	public function __construct()
	{
		
	}
	
	public function report()
	{
		\Franklin\view\View::$root = dirname(__DIR__).'/view';
		return new \Franklin\view\View('report.html', array(
			
		));
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