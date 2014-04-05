<?php

namespace Franklin\test\Foursquare\Venue;

use
    Franklin\test\Scrape\Scrape,
    Franklin\network\CURL
    ;

class Venue extends Scrape
{
    public $name = 'Foursquare Venue';
    
    public $description = 'Foursquare venue checkins and people counter';

    public function run()
    {
        $this->beforeRun();

        $url = "https://de.foursquare.com/v/".$this->config->venue;
        $CURL = new CURL;
        if (!$response = $CURL->get($url)) {
            return 0;
        }

        // the international result of a foursquare venue contains json encoded
        // information about varios venues, we need the id of the current venue
        // to get the counters for that venue instead of any other
        $venueId = substr(
            $this->config->venue,
            strpos($this->config->venue, '/') + 1
        );
        
        // capture data from the javascript json from the page’s source
        $data = array();
        $regexps = array(
            'checkins' => '/'.$venueId.'.*checkinsCount":(\d+)/',
            'people' => '/'.$venueId.'.*usersCount":(\d+)/',
        );
        foreach($regexps as $key => $regexp) {
            if (!preg_match($regexp, $response, $matches)) {
                $value = 0;
            } else {
                $value = (int) $matches[1];
            }
            $data[$key] = $value;
        }
                
        // return the value that was desired in the config
        return $data[$this->config->key];
    }
}