<?php

namespace Franklin\test\Wordpress\Plugin\test;

use
    Franklin\test\Wordpress\Plugin\Plugin,
    Franklin\test\Wordpress\Plugin\Config
    ;

/**
 * @group Tests
 * @group Wordpress
 */
class PluginTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $config = new Config(array(
            'slug' => 'bbpress',
        ));
        $this->fixture = new Plugin($config);
    }
    
    public function testDefaultKey()
    {
        $this->assertEquals('total_downloads', $this->fixture->config->key);
    }

    public function testTotalDownloads()
    {
        $this->fixture->config->key = 'total_downloads';
        $result = $this->fixture->run();
        $this->assertInternalType('integer', $result);
        $this->assertGreaterThan(
            1000000,
            $result,
            'Expected downloads off bbpress to be larger than 1.000.000'
        );
    }

    public function invalidSlugs()
    {
        return [
            ['something-which-is-not-defined'],
        ];
    }

    /**
     * @dataProvider invalidSlugs
     * @param  [type] $invalidSlug [description]
     * @return [type]              [description] 
     */
    public function testPluginWithInvalidSlug($invalidSlug)
    {
        $this->fixture->config->slug = $invalidSlug;
        $result = $this->fixture->run();
        $this->assertInternalType('boolean', $result);
        $this->assertFalse($result);
    }

    public function testDownloadsYesterday()
    {
        $this->fixture->config->key = 'downloads_yesterday';
        $result = $this->fixture->run();
        $this->assertInternalType('integer', $result);
        $this->assertGreaterThan(
            100,
            $result
        );
    }

    public function testNumRatings()
    {
        $this->fixture->config->key = 'num_ratings';
        $result = $this->fixture->run();
        $this->assertInternalType('integer', $result);
        $this->assertGreaterThan(
            100,
            $result
        );
    }

    public function testRating()
    {
        $this->fixture->config->key = 'rating';
        $result = $this->fixture->run();
        $this->assertInternalType('integer', $result);
        $this->assertGreaterThan(
            10,
            $result
        );
    }
    
}