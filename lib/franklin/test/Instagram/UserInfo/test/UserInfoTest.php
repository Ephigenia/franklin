<?php

namespace Franklin\test\Instagram\UserInfo\Test;

use
    Franklin\test\Instagram\UserInfo\UserInfo,
    Franklin\test\Instagram\UserInfo\Config
    ;

/**
 * @group Tests
 * @group Instagram
 * @group medium
 */
class UserInfoTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $config = new Config(array(
            'username' => 'ephigenia',
        ));
        $this->fixture = new UserInfo($config);
    }
    
    public function testDefaultRun()
    {
        $result = $this->fixture->run();
        $this->assertInternalType('integer', $result, 'Expected Result to be a integer value');
        $this->assertGreaterThanOrEqual(100, $result, 'Expected Result to be above 100');
    }

    public function followersValues()
    {
        return array(
            array('ephigenia', 100),
            array('tonyhawk', 1109000),
            array('instagram', 53000000),
        );
    }

    /**
     * @dataProvider followersValues
     */
    public function testFollowers($username, $expectedMinimumFollowersCount)
    {
        $this->fixture->config->key = 'followers';
        $this->fixture->config->username = $username;
        $result = $this->fixture->run();
        $this->assertInternalType('integer', $result, 'Expected Result to be a integer value');
        $this->assertGreaterThanOrEqual(
            $expectedMinimumFollowersCount,
            $result,
            sprintf(
                "Expected instagram user %s to have at least %d followers",
                $username, $expectedMinimumFollowersCount
            )
        );
    }

    public function postValues()
    {
        return array(
            array('ephigenia', 1000),
            array('tonyhawk', 2400),
        );
    }

    /**
     * @dataProvider postValues
     */
    public function testPosts($username, $expectedMinimumPostsCount)
    {
        $this->fixture->config->key = 'posts';
        $this->fixture->config->username = $username;
        $result = $this->fixture->run();
        $this->assertInternalType('integer', $result, 'Expected Result to be a integer value');
        $this->assertGreaterThanOrEqual(
            $expectedMinimumPostsCount,
            $result,
            sprintf(
                "Expected instagram user %s to have at least %d posts",
                $username, $expectedMinimumPostsCount
            )
        );
    }

    public function testFollowing()
    {
        $this->fixture->config->key = 'following';
        $result = $this->fixture->run();
        $this->assertInternalType('integer', $result, 'Expected Result to be a integer value');
        $this->assertGreaterThanOrEqual(
            110,
            $result,
            sprintf(
                "Expected  user %s to follow at least %d other users",
                $this->fixture->config['username'],
                110
            )
        );
    }
}