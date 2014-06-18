<?php

namespace Franklin\test\Spotify\ArtistPopularity\Test;

use
    Franklin\test\Spotify\ArtistPopularity\ArtistPopularity,
    Franklin\test\Spotify\ArtistPopularity\Config
    ;

/**
 * @group Tests
 * @group Spotify
 * @group medium
 */
class ArtistPopularityTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$config = new Config();
		$this->fixture = new ArtistPopularity($config);
	}

	public function testWithouthArtistIdFilled()
	{
		$this->fixture->config->id = '';
		$result = $this->fixture->run();
		$this->assertInternalType('boolean', $result, 'Except the populartiy of an unknown artist to be false');
	}

	public function testWithInvalidArtistId()
	{
		$this->fixture->config->id = 'i-am-not-found';
		$result = $this->fixture->run();
		$this->assertInternalType('boolean', $result, 'Except the populartiy of not found artist to be false');	
	}

	public function testWithArtistWhoHasPopularity()
	{
		// depeche mode artist id
		$depecheModeSpotifyId = '762310PdDnwsDxAQxzQkfX';
		$this->fixture->config->id = $depecheModeSpotifyId;
		$result = $this->fixture->run();
		$this->assertInternalType('integer', $result, 'Expected the popularity of depeche mode to be found and a valid integer');	
		$this->assertGreaterThanOrEqual(10, $result, 'Expect the popularity of depeche mode to be larger than 1');
		$this->assertLessThanOrEqual(100, $result, 'Except that the popularity value returned by spotify is lower or equal 100');
	}
}