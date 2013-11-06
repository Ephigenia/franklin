<?php

namespace Franklin\test\Itunes\ApplicationInfo;

use
    Franklin\test\Scrape\Scrape,
    Franklin\network\CURL
    ;

class ApplicationInfo extends Scrape
{
    public $name = 'iTunes Application Informations';
    
    public $description = 'Can track kpis of applications in the apple appstore using the itunes json api.';

    public function run()
    {
        $this->beforeRun();
        
        $query = array(
            'id' => $this->config->id,
            'country' => $this->config->country,
            'entity' => 'software',
        );
        if (preg_match('/^\d+$/', $this->config->id)) {
            $baseUrl = 'https://itunes.apple.com/lookup';
            $query['id'] = $this->config->id;
        } else {
            $baseUrl = 'https://itunes.apple.com/search';
            $query['term'] = $this->config->id;
        }

        $CURL = new CURL();
        if (!$result = $CURL->get($baseUrl, $query)) {
            return 0;
        }

        // check the response format
        if (!$json = json_decode($result, true)) {
            return 0;
        }
        // always take the first result
        if (!isset($json['results']) || !isset($json['results'][0])) {
            return 0;
        }
        $data = $json['results'][0];
        // extract the data
        if (isset($data[$this->config->key])) {
            return (float) $data[$this->config->key];
        }
        return 0;
    }
}