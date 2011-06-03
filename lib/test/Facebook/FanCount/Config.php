<?php

namespace Franklin\test\Facebook\FanCount;

class Config extends \Franklin\test\Config
{
	public $defaults = array(
		'id' => null,
	);
	
	public function offsetSet($key, $value)
	{
		switch($key) {
			case 'id':
				$this['url'] = 'http://graph.facebook.com/'.urlencode($value);
				break;
		}
		return parent::offsetSet($key, $value);
	}
}