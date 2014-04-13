<?php

namespace Franklin\test\Klout\Score\test;

use
	Franklin\test\Klout\Score\Score,
	Franklin\test\Klout\Score\Config
	;

/**
 * @group Tests
 * @group Klout
 */
class ScoreTest extends \PHPUnit_Framework_TestCase
{
	public function usernames()
	{
		return array(
			array('ibm', 20),
			array('ephigenia', 30)
		);
	}
	
	/**
	 * @dataProvider usernames
	 */
	public function testRun($username, $expectedMinimumScore = 1)
	{
		$config = new Config(array(
			'username' => $username,
		));
		$this->fixture = new Score($config);
		$result = $this->fixture->run();
		$this->assertInternalType('integer', $result, 'Expected Result to be a float value');
		$this->assertGreaterThanOrEqual($expectedMinimumScore, $result, sprintf(
			"Expected klout user %s to have a score higher or equal %d",
			$username,
			$expectedMinimumScore
		));
	}
}