<?php

namespace Franklin\test\Facebook\PakeLikes\test;

use
	Franklin\test\Facebook\PageLikes\PageLikes,
	Franklin\test\Facebook\PageLikes\Config
	;

/**
 * @group Tests
 * @group Facebook
 */
class PageLikesTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'id' => 'ironmaiden',
		));
		$this->fixture = new PageLikes($config);
	}

	public function testInvalidUsername()
	{
		$this->fixture->config['id'] = 'this is not a found username';
		$result = $this->fixture->run();
		$this->assertInternalType('boolean', $result);
		$this->assertFalse($result);
	}

	public function getUsernameValues()
	{
		return array(
			array('ironmaiden', 10000000),
			array('CDU', 10000),
		);
	}

	/**
	 * @dataProvider getUsernameValues
	 */
	public function testRunWithNameInsteadOfId($username, $expectedMinimumCount) 
	{
		$this->fixture->config['id'] = $username;
		$result = $this->fixture->run();
		$this->assertInternalType('integer', $result);
		$this->assertGreaterThanOrEqual($expectedMinimumCount, $result);
	}
}