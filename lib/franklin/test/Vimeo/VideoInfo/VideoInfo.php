<?php

namespace Franklin\test\Vimeo\VideoInfo;

use
	Franklin\test\Test,
	Franklin\network\CURL
	;

class VideoInfo extends Test
{
	public $name = 'Vimeo Video Information';
	
	public $description = 'Information about a video';
	
	public function run()
	{
		$this->beforeRun();
		$url = 'http://vimeo.com/api/v2/video/'.$this->config->id.'.json';
		$CURL = new CURL();
		$result = $CURL->get($url);
		if ($result) {
			$json = json_decode($result, true);
			if (isset($json[0]['stats_number_of_'.$this->config->key])) {
				return (int) $json[0]['stats_number_of_'.$this->config->key];
			}
		}
		return 0;
	}
}