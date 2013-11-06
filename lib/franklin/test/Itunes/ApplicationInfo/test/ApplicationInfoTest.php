<?php

namespace Franklin\test\Itunes\ApplicationInfo\test;

use
    Franklin\test\Itunes\ApplicationInfo\ApplicationInfo,
    Franklin\test\Itunes\ApplicationInfo\Config
    ;

/**
 * @group Tests
 * @group Itunes
 */
class ApplicationInfoTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $config = new Config(array(
            'id' => 389801252,
            'country' => 'de',
        ));
        $this->fixture = new ApplicationInfo($config);
    }

    public function getValidKeys()
    {
        return array(
            array('price', 0.0),
            array('averageUserRating'),
            array('averageUserRatingForCurrentVersion'),
            array('userRatingCount'),
            array('userRatingCountForCurrentVersion'),
        );
    }

    /**
     * @dataProvider getValidKeys
     */
    public function testDifferentKeys($key, $minimumValue = 0.1)
    {
        $this->fixture->config->key = $key;
        $result = $this->fixture->run();
        // validate result
        $this->assertInternalType('float', $result);
        $this->assertGreaterThanOrEqual($minimumValue, $result);
    }
    
    public function testWithTermWithSingleResults()
    {
        $this->fixture->config->id = 'snoopet';
        $this->fixture->config->key = 'averageUserRating';
        $result = $this->fixture->run();
        // validate result
        $this->assertInternalType('float', $result);
        $this->assertGreaterThanOrEqual(0.5, $result);
    }

    public function testWithTermThatHasMultipleResults()
    {
        // "snoo" should have at least 30 results
        $this->fixture->config->id = 'snoo';
        $this->fixture->config->key = 'averageUserRating';
        $result = $this->fixture->run();
        // validate result
        $this->assertInternalType('float', $result);
        $this->assertGreaterThanOrEqual(0.5, $result);
    }

    public function testWithId()
    {
        $this->fixture->config->id = 389801252; // instagram
        $this->fixture->config->key = 'userRatingCount';
        $result = $this->fixture->run();
        // validate result
        $this->assertInternalType('float', $result);
        $this->assertGreaterThanOrEqual(3000, $result);
    }
}