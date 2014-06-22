<?php

namespace Franklin\test\Wordpress\Plugin;

use
    Franklin\test\Scrape\Scrape,
    Franklin\network\CURL
    ;

class Plugin extends Scrape
{
    public $name = 'Wordpress Plugin Stats';

    public $description = 'Wordpress plugin informations';

    public function run()
    {
        $this->beforeRun();

        $url = sprintf(
            'http://wpapi.org/api/plugin/%s.json', 
            $this->config->slug
        );
        
        $curl = new CURL();
        $response = $curl->get($url);
        if ($result = $this->processResponse($response)) {
            $result = $this->convertValue($result);
        }
        return $result;
    }

    public function processResponse($response)
    {
        if (!$response) {
            return false;
        }

        $json = json_decode($response, true);
        if (!$json || !is_array($json)) {
            return false;
        }

        if (!isset($json[$this->config->key])) {
            return false;
        }
        return $json[$this->config->key];
    }

    public function convertValue($value)
    {
        $value = str_replace(',', '', $value);
        if ($this->config->key == 'average_downloads') {
            return (float) $value;
        }
        return (int) $value;
    }
}