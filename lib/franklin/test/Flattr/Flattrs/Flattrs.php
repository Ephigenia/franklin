<?php

namespace Franklin\test\Flattr\Flattrs;

use
	Franklin\test\Test,
	Franklin\network\CURL
	;
	
class Flattrs extends Test
{
	public $name = 'Flattr flattrs count';
	
	public $description = 'flattrs on a thing';
	
	protected function getThingFlattrs($thingId)
	{
		$CURL = new CURL();
		$result = $CURL->get('https://api.flattr.com/rest/v2/things/'.$thingId.'.json');
		if ($result && $data = json_decode($result, true)) {
			if (!empty($data['flattrs'])) {
				return (int) $data['flattrs'];
			}
		}
		return 0;
	}
	
	protected function getURLFlattrs($url)
	{
		$CURL = new CURL();
		$data = array(
			'url' => $url,
		);
		$result = $CURL->get('https://api.flattr.com/rest/v2/things/lookup.json', $data);
		if ($result && $data = json_decode($result, true)) {
			if (!empty($data['flattrs'])) {
				return (int) $data['flattrs'];
			}
		}
		return 0;
	}
	
	protected function getUserFlattrs($username)
	{
		$CURL = new CURL();
		$source = $CURL->get('http://api.flattr.com/button/view/', array(
			'url' => 'https://flattr.com/profile/'.$this->config->username,
		));
		if ($source) {
			$DOMDocument = new \DOMDocument();
			$DOMDocument->loadHTML($source);
			$DOMXPath = new \DOMXPath($DOMDocument);
			$nodes = $DOMXPath->query('//span[@class="flattr-count"]/span');
			if ($nodes->length > 0) {
				foreach($nodes as $node) {
					return $node->textContent;
				}
			}
		}
		return 0;
	}
	
	public function run()
	{
		$this->beforeRun();
		if (!empty($this->config->url)) {
			return $this->getURLFlattrs($this->config->url);
		}
		if (!empty($this->config->thing)) {
			return $this->getThingFlattrs($this->config->thing);
		}
		if (!empty($this->config->username)) {
			return $this->getUserFlattrs($this->config->username);
		}
		return 0;
	}
}