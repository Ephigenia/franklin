<?php

namespace Franklin\test\Twitter\Following;

use
	Franklin\test\Scrape\Scrape
	;

class Following extends Scrape
{
	public $name = 'Twitter Followers Count';
	
	public $description = 'Tracks the number of followers of a specific twitter user';

    public function processResponse($response)
    {
        // find out if the twitter user get’s the new twitter pages rendered
        // if so the second regexp will match, otherwise the other regexp
        $regexps = array(
            $this->config->regexp,
            '@title="([\.\,\d]+).+ data-nav="following"@i'
        );
        
        foreach($regexps as $regexp) {
            if (preg_match_all($regexp, $response, $found)) {
                $result = $found[1][0];
                return $result;
            }
        }
        return false;
    }

    public function convertValue($value)
    {
        return (int) preg_replace('/[^\d]+/', '', $value);
    }
}