<?php

namespace Franklin\test\Slideshare\UserInfo;

use
    Franklin\test\Scrape\Scrape,
    Franklin\network\CURL
    ;

class UserInfo extends Scrape
{
    public $name = 'Slideshare UserInfo';
    
    public $description = 'Captures different values of a slideshare user account';

    public function run()
    {
        $this->beforeRun();

        $url = "http://www.slideshare.net/".urlencode($this->config->username);
        $CURL = new CURL;
        if (!$response = $CURL->get($url)) {
            return 0;
        }

        // capture data from the javascript json from the page’s source
        $data = array();
        $regexps = array(
            'followers' => '/(\d+) Follower/',
            'slides' => '/(\d+) SlideShares/',
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