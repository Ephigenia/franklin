<?php

namespace Franklin\test\Soundcloud\Trackinfo;

use
	Franklin\test\Test,
	Franklin\network\CURL
	;

class TrackInfo extends Test
{
	public $name = 'Soundcloud track information';
	
	public $description = 'record information about a single track on soundcloud.com';
	
	public function run()
	{
		$this->beforeRun();
		$url = 'http://api.soundcloud.com/tracks/'.$this->config->id.'.json';
		$CURL = new CURL();
		$result = $CURL->get($url, array('consumer_key' => 'aecdbad067b1f60f765db9a16af53cc4'));
		if ($result) {
			$json = json_decode($result, true);
			if (isset($json[$this->config->key.'_count'])) {
				return (int) $json[$this->config->key.'_count'];
			}
		}
		return 0;
	}
}