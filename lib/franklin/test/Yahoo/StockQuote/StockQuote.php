<?php

namespace Franklin\test\Yahoo\StockQuote;

use
	Franklin\test\Test,
	Franklin\network\CURL
	;

class StockQuote extends Test
{
	public $name = 'Yahoo Finance Stock Quote';
	
	public $description = 'Stock Quote for a symbol';
	
	public function run()
	{
		$this->beforeRun();
		$CURL = new CURL();
		$data = array(
			's' => $this->config->symbol,
			'f' => $this->config->format,
		);
		$endpoint = 'http://download.finance.yahoo.com/d/quotes.csv';
		$result = $CURL->get($endpoint, $data);
		if (!$result || !($data = explode(',', $result))) {
			var_dump($result);
			return 0;
		}
		return (float) $data[0];
	}
}