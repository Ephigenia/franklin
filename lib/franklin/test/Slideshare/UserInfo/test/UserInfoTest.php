<?php

namespace Franklin\test\Slideshare\UserInfo\Test;

use
    Franklin\test\Slideshare\UserInfo\UserInfo,
    Franklin\test\Slideshare\UserInfo\Config
    ;

/**
 * @group Tests
 * @group Slideshare
 * @group medium
 */
class SlideshareTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $config = new Config(array(
            'username' => 'ephigenia1',
        ));
        $this->fixture = new UserInfo($config);
    }

    public function testDefault()
    {
        $result = $this->fixture->run();
        $this->assertInternalType('integer', $result);
        $this->assertGreaterThanOrEqual(20, $result);
    }

    public function testUserNotFound()
    {
        $this->fixture->config->username = 'nobody_is_found_for_this_username';
        $result = $this->fixture->run();
        $this->assertEquals(0, $result);
    }

    public function followersValues()
    {
        return array(
            array('ephigenia1', 25),
            array('bright9977', 1600),
        );
    }

    /**
     * @dataProvider followersValues
     */
    public function testFollowers($username, $expectedMinimumFollowers)
    {
        $this->fixture->config->key = 'followers';
        $this->fixture->config->username = $username;

        $result = $this->fixture->run();
        $this->assertInternalType('integer', $result);
        $this->assertGreaterThanOrEqual($expectedMinimumFollowers, $result,
            sprintf(
                'Expected %s to have at least %d followers',
                $username,
                $expectedMinimumFollowers
            )
        );
    }

    public function slidesValues()
    {
        return array(
            array('ephigenia1', 2),
            array('bright9977', 1300),
        );
    }

    /**
     * @dataProvider slidesValues
     */
    public function testSlides($username, $expectedMinimumSlides)
    {
        $this->fixture->config->key = 'slides';
        $this->fixture->config->username = $username;

        $result = $this->fixture->run();
        $this->assertInternalType('integer', $result);
        $this->assertGreaterThanOrEqual($expectedMinimumSlides, $result,
            sprintf(
                'Expected %s to have at least %d slides',
                $username,
                $expectedMinimumSlides
            )
        );
    }
}