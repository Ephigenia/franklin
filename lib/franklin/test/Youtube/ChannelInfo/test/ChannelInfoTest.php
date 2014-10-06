<?php

namespace Franklin\test\Youtube\ChannelInfo\test;

use
    Franklin\test\Youtube\ChannelInfo\ChannelInfo,
    Franklin\test\Youtube\ChannelInfo\Config
    ;

/**
 * @group Tests
 * @group Youtube
 */
class ChannelInfoTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $config = new Config(array(
            'username' => 'linksfraktion',
        ));
        $this->fixture = new ChannelInfo($config);
    }

    public function testInvalidUsername()
    {
        $this->fixture->config->username = 'Blablub-tralala-invalid-stuff';
        $result = $this->fixture->run();
        $this->assertInternalType('boolean', $result);
        $this->assertFalse($result);
    }

    public function getFollowersCountParameters()
    {
        return array(
            array('linksfraktion', 10000),
            array('officialpsy', 7400000),
        );
    }
    
    /**
     * @dataProvider getFollowersCountParameters
     */    
    public function testFollowerCount($username, $expectedMinimumFollowerCount)
    {
        $this->fixture->config->username = $username;
        $this->fixture->config->key = 'followers';
        $result = $this->fixture->run();
        $this->assertInternalType('integer', $result);
        $this->assertGreaterThan($expectedMinimumFollowerCount, $result);
    }

    public function getViewsCountParameters()
    {
        return array(
            array('linksfraktion', 9000000),
            array('officialpsy', 4057000000),
        );
    }

    /**
     * @dataProvider getViewsCountParameters
     */
    public function testViewsCount($username, $expectedMinimumViewsCount)
    {
        $this->fixture->config->username = $username;
        $this->fixture->config->key = 'views';
        $result = $this->fixture->run();
        $this->assertInternalType('integer', $result);
        $this->assertGreaterThan($expectedMinimumViewsCount, $result);
    }
}