<?php

namespace Franklin\test\Facebook\PageTalkingAbout\test;

use
	Franklin\test\Facebook\PageTalkingAbout\PageTalkingAbout,
	Franklin\test\Facebook\PageTalkingAbout\Config
	;

/**
 * @group Tests
 * @group Facebook
 */
class PageTalkingAboutTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config(array(
			'id' => 'ironmaiden',
		));
		$this->fixture = new PageTalkingAbout($config);
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
			array('ironmaiden', 1000),
			array('CDU', 100),
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