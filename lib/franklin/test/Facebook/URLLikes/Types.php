<?php

namespace Franklin\test\Facebook\URLLikes;

class Types extends \ArrayObject
{
	CONST TOTAL = 'total_count';
	CONST LIKES = 'likes_count';
	CONST COMMENTS = 'comments_count';
	CONST SHARES = 'shares_count';
	CONST CLICKS = 'clicks_count';
	
	public function __construct()
	{
		parent::__construct(array(
			self::TOTAL => self::TOTAL,
			self::LIKES => self::LIKES,
			self::COMMENTS => self::COMMENTS,
			self::SHARES => self::SHARES,
			self::CLICKS => self::CLICKS,
		));
	}
}