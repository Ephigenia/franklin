<?php

namespace Franklin\test\Flipboard\UserInfo\test;

use
    Franklin\test\Flipboard\UserInfo\UserInfo,
    Franklin\test\Flipboard\UserInfo\Config
    ;

/**
 * @group Tests
 * @group Flipboard
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

    public function testDefaults()
    {
        $this->assertEquals($this->fixture->config->key, 'followers');
    }
    
    public function testArticles()
    {
        $this->fixture->config->key = 'articles';
        $result = $this->fixture->run();
        $this->assertGreaterThan(1000, $result);
    }

    public function testFollowers()
    {
        $result = $this->fixture->run();
        $this->assertGreaterThan(1000, $result);
    }

    public function testMagazines()
    {
        $this->fixture->config->key = 'magazines';
        $result = $this->fixture->run();
        $this->assertGreaterThan(1, $result);
    }
}