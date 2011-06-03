<?php

class Likes extends AbstractTest
{
	public $name = 'Facebook Likes';
	
	public function run()
	{
		$CURL = new CURL();
		$data = array(
			'query' => sprintf('select total_count,like_count,comment_count,share_count,click_count from link_stat where url="http://%s"', $this->config->host),
			'format' => json,
		)
		$response = $CURL->get('http://api.facebook.com/method/fql.query', $data);
		if (($json = json_decode($response, true)) && isset($json['like_count'])) {
			return (float) $json['like_count'];
		}
		return false;
	}
}