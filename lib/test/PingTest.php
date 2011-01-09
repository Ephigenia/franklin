<?php

class_exists('Test') or require __DIR__.'/Test.php';
class_exists('Ping') or require __DIR__.'/../network/Ping.php';

class PingTest extends Test
{
	public function run()
	{
		$Ping = new Ping($this->host, $this->timeout);
		$this->result = $this->ping->run();
		if ($this->result > $this->config['max']) {
			$this->error = 'Maximum ping reached: '.$this->result.'/'.$this->config['max'];
		}
		return parent::run();
	}
}