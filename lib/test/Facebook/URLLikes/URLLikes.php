<?php

namespace Franklin\test\Facebook\URLLikes;

use 
	Franklin\test\Test,
	Franklin\network\CURL
	;

class URLLikes extends Test
{
	public $name = 'Facebook Likes';
	
	public function run()
	{
		$CURL = new CURL();
		$data = array(
			'query' => sprintf('select total_count,like_count,comment_count,share_count,click_count from link_stat where url="%s"', $this->config->url),
			'format' => 'json',
		);
		$response = $CURL->get('http://api.facebook.com/method/fql.query', $data);
		if (($json = json_decode($response, true)) && isset($json[0][$this->config->type])) {
			return (float) $json[0][$this->config->type];
		}
		return false;
	}
}