<?php

namespace Franklin\test\Wordpress\Plugin;

use
    Franklin\test\Scrape\Scrape,
    Franklin\network\CURL
    ;

/**
 * Scraper which scrapes the http://wpapi.org/ wwebsite for plugin 
 * information.
 */
class Plugin extends Scrape
{
    public $name = 'Wordpress Plugin Stats';

    public $description = 'Wordpress plugin informations';

    public function run()
    {
        $this->beforeRun();
        switch($this->config->key) {
            case 'total_downloads':
                $urlTemplate = 'https://wordpress.org/plugins/%s/';
                break;
            case 'downloads_yesterday':
                $urlTemplate = 'https://api.wordpress.org/stats/plugin/1.0/downloads.php?slug=%s&limit=267&callback=?';
                break;
            default:
                $urlTemplate = 'http://wpapi.org/api/plugin/%s.json';
                break;
        }
        $url = sprintf($urlTemplate, urlencode($this->config->slug));

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
        switch($this->config->key) {
            case 'total_downloads':
                if (!preg_match_all('/UserDownloads:(\d+)/i', $response, $matches)) {
                    return false;
                }
                $value = $matches[1][0];
                break;
            case 'downloads_yesterday':
                $json = json_decode($response, true);
                if (!$json || !is_array($json)) {
                    return false;
                }
                $yesterday = date('Y-m-d', mktime(1, 1, 1, date('m'), date('d')-1, date('Y')));
                if (!isset($json[$yesterday])) {
                    return false;
                }
                $value = $json[$yesterday];
                break;
            default:
                $json = json_decode($response, true);
                if (!$json || !is_array($json)) {
                    return false;
                }
                if (!isset($json[$this->config->key])) {
                    return false;
                }
                $value = $json[$this->config->key];
                break;
        }

        return $this->convertValue($value);
    }

    public function convertValue($value)
    {
        return (int) str_replace(',', '', $value);
    }
}