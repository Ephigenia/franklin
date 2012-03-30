<?php

namespace Franklin;

class Franklin
{
	protected $groups = array();
	
	protected $config;
	
	public function report()
	{
		\Franklin\view\View::$baseDir = FRANKLIN_ROOT.'/view/';
		$view = new \Franklin\view\View('report.html');
		$view['groups'] = $this->groups;
		$view['config'] = $this->config;
		$view['franklin'] = $this;
		return $view;
	}
	
	public function cron()
	{
		$this->runAllTests();
	}
	
	public function loadConfig($filename)
	{
		require $filename;
		$this->config = new Config($config);
		foreach($this->config['groups'] as $groupConfig) {
			$this->groups[] = new Group($groupConfig['name'], $groupConfig);
		}
		return $this;
	}
	
	public function storage(\Franklin\test\Test $Test)
	{
		$filename =
			FRANKLIN_ROOT.'/data/'
			.preg_replace('@[^a-z0-9_-]@i', '-', get_class($Test))
			.'-'.md5(serialize($Test->config))
			.'.csv'
		;
		$Storage = new \Franklin\storage\FlatFile($filename);
		return $Storage;
	}
	
	public function runAllTests()
	{
		$startTimestamp = time();
		$counters = array(
			'tests' => 0,
			'runs' => 0,
		);
		foreach($this->groups as $TestGroup) foreach($TestGroup as $Test) {
			$counters['tests']++;
			if (empty($Test->lastTestTimestamp) || $Test->lastTestTimestamp + $Test->interval < time()) {
				$result = $Test->run();
				$this->storage($Test)->store(new \DateTime(), $result);
				$counters['runs']++;
				printf('Test %s: %f'.PHP_EOL, $Test->name, $result);
			}
		}
		printf('%s tests checked, %s done, %s skipped in %d seconds', $counters['tests'], $counters['runs'], $counters['tests'] - $counters['runs'], time() - $startTimestamp);
	}
}