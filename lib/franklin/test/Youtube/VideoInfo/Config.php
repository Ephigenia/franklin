<?php

namespace Franklin\test\Youtube\VideoInfo;

use
	Franklin\test\config\type\String,
	Franklin\test\config\type\Integer
	;

class Config extends \Franklin\test\config\Config
{
	public function init()
	{
		$this->definition->append(
			new String('id', true, null, 'video id'),
			new String('key', true, 'likes', 'Key of json result to inspect (rating, likeCount, ratingCount, viewCount, favoriteCount, commentCount)')
		);
		return true;
	}
}