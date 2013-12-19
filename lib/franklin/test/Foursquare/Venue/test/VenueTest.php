<?php

namespace Franklin\test\Foursquare\Venue\Test;

use
    Franklin\test\Foursquare\Venue\Venue,
    Franklin\test\Foursquare\Venue\Config
    ;

/**
 * @group Tests
 * @group Foursquare
 * @group medium
 */
class VenueTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $config = new Config(array(
            'venue' => 'foobugs/4e9834e1c2ee4857b0660e93',
        ));
        $this->fixture = new Venue($config);
    }

    public function testDefault()
    {
        $result = $this->fixture->run();
        $this->assertInternalType('integer', $result);
        $this->assertGreaterThanOrEqual(780, $result);
    }

    public function testVenueNotFound()
    {
        $this->fixture->config->venue = 'not_existing_venue_name';

        $result = $this->fixture->run();
        $this->assertEquals(0, $result);
    }

    public function checkinsValues()
    {
        return array(
            array('foobugs/4e9834e1c2ee4857b0660e93', 780),
            array('empire-state-building/43695300f964a5208c291fe3', 102164),
        );
    }

    /**
     * @dataProvider checkinsValues
     */
    public function testCheckins($venue, $expectedMinimumCheckinsCount)
    {
        $this->fixture->config->key = 'checkins';
        $this->fixture->config->venue = $venue;

        $result = $this->fixture->run();
        $this->assertInternalType('integer', $result);
        $this->assertGreaterThanOrEqual($expectedMinimumCheckinsCount, $result, sprintf(
            'Expected %s to have at least %d checkins',
            $venue,
            $expectedMinimumCheckinsCount
        ));
    }

    public function peopleVenues()
    {
        return array(
            array('foobugs/4e9834e1c2ee4857b0660e93', 8),
            array('empire-state-building/43695300f964a5208c291fe3', 71414),
        );
    }

    /**
     * @dataProvider peopleVenues
     */
    public function testPeople($venue, $expectedMinimumPeopleCount)
    {
        $this->fixture->key = 'people';
        $this->fixture->config->venue = $venue;

        $result = $this->fixture->run();
        $this->assertInternalType('integer', $result);
        $this->assertGreaterThanOrEqual($expectedMinimumPeopleCount, $result, sprintf(
            'Expected %s to have at least %d people checked in',
            $venue,
            $expectedMinimumPeopleCount
        ));
    }
}