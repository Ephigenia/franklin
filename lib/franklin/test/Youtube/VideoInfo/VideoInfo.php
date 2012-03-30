<?php

namespace Franklin\test\Youtube\VideoInfo;

use
	Franklin\test\Test,
	Franklin\network\CURL
	;

class VideoInfo extends Test
{
	public $name = 'Youtube Video Information';
	
	public $description = 'Information about a youtube video';
	
	public function run()
	{
		$url = 'http://gdata.youtube.com/feeds/api/videos?q='.$this->config->id.'&v=2&alt=jsonc';
		$CURL = new CURL();
		$result = $CURL->get($url);
		if ($result && $data = json_decode($result, true)) {
			return (float) $data['data']['items'][0][$this->config->key];
		}
		return 0;
	}
}