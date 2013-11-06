<?php

namespace Franklin\test\PlayStore\ApplicationInfo\test;

use
    Franklin\test\PlayStore\ApplicationInfo\ApplicationInfo,
    Franklin\test\PlayStore\ApplicationInfo\Config
    ;

/**
 * @group Tests
 * @group PlayStore
 */
class ApplicationInfoTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $config = new Config(array(
            'bundleIdentifier' => 'com.instagram.android',
            'country' => 'de',
        ));
        $this->fixture = new ApplicationInfo($config);
    }

    public function testAverageUserRating()
    {
        $this->fixture->config->key = 'averageUserRating';
        $result = $this->fixture->run();
        // validate result
        $this->assertInternalType('float', $result);
        $this->assertGreaterThanOrEqual(2.0, $result);
        $this->assertLessThanOrEqual(10, $result);
    }

    public function testUserRatingCount()
    {
        $this->fixture->config->key = 'userRatingCount';
        $result = $this->fixture->run();
        // validate result
        $this->assertInternalType('float', $result);
        $this->assertGreaterThanOrEqual(6000000, $result);
    }

    public function testAverageUserRatingInCountryUs()
    {
        $this->fixture->config->key = 'averageUserRating';
        $this->fixture->config->country = 'us';
        $result = $this->fixture->run();
        // validate result
        $this->assertInternalType('float', $result);
        $this->assertGreaterThanOrEqual(2.0, $result);
        $this->assertLessThanOrEqual(10, $result);
    }
}