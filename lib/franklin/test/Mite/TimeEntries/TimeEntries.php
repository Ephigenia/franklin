<?php

namespace Franklin\test\Mite\TimeEntries;

use
	Franklin\test\Test
	;
	
class TimeEntries extends Test
{
	public $name = 'mite.yo.lk time entries';
	
	public $description = '';
	
	protected $api;
	
	public function init()
	{
		if (!function_exists('simplexml_load_file')) {
			throw new \RuntimeException('SimpleXML not available.');
		}
		if (!class_exists('mite')) {
			require FRANKLIN_ROOT.'/lib/mite-api-php/mite.php';
		}
		if (empty($this->api)) {
			$this->api = \mite::getInstance();
			$this->api->init($this->config->api_key, $this->config->subdomain, 'franklin/0.3');
		}
		return parent::init();
	}

	public function run()
	{
		$this->beforeRun();
		$timeEntriesXML = $this->api->sendRequest('get', '/time_entries.xml?group_by=day');
		if (!$timeEntriesXML instanceOf \SimpleXMLElement) {
			return 0;
		}
		$data = array();
		foreach($timeEntriesXML as $node) {
			$data[(string) $node->day] = array(
				'minutes' => (int) $node->minutes,
				'revenue' => (float) $node->revenue / 100,
			);
		}
		$yesterday = date('Y-m-d', strtotime('yesterday'));
		if (Isset($data[$yesterday])) {
			return $data[$yesterday][$this->config->key];
		}
		return 0;
	}
}