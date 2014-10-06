<?php

namespace Franklin\test\Youtube\VideoInfo;

use
	Franklin\test\config\type\String
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('id', true, null, 'video id'),
			new String('key', true, 'likeCount', 'Key of json result to inspect (rating, likeCount, ratingCount, viewCount, favoriteCount, commentCount)')
		);
		return true;
	}
}