<?php

namespace Franklin\test\Facebook;

class Config extends \Franklin\test\Config
{
	public $defaults = array(
		'id' => null,
		'regexp' => '@fan_count":\s(\d+)@i';
	);
	
	public function setId($id)
	{
		$this->url = 'https://graph.facebook.com/'.urlencode($id); 
		return $this;
	}
}