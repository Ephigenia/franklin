<?php

namespace Franklin\network;

/**
 * 	CURL Wrapper Class
 * 
 * 	This class will only work if you have PHP installed with the CURL extension
 * 	which is _not_ installed on Win32 system. Please check the PHP help page
 * 	for more information: {@link http://www.php.net/manual/en/curl.requirements.php}<br />
 * 	<br />
 * 	
 * 	Example Usage to Download an imag:
 * 	<code>
 * 	$curl = new CURL('http://www.ephigenia.de/favico.ico');
 * 	file_put_contents('downloaded.ico', $curl->exec());
 * 	</code>
 * 	
 * 	@package Franklin
 * 	@subpackage Franklin.Network
 * 	@author Marcel Eichner // Ephigenia <love@ephigenia.de>
 * 	@since 11.11.2008
 */
class CURL
{	
	private $handle;
	
	const METHOD_POST = 0;
	const METHOD_GET = 1;
	
	public $options = array(
		'method' => self::METHOD_POST,
		'data' => array(),
		'cookie' => array(),
		'port' => 80,
		'referer' => false,
		'url' => false,
		'CURLOPT_TIMEOUT' => 10,
		'user-agent' => 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_5; de-de) AppleWebKit/525.18 (KHTML, like Gecko) Version/3.1.2 Safari/525.20.1',
	);
	
	/**
	 * Curl wrapper constructor
	 * 	@
	 */
	public function __construct(Array $options = array())
	{
		if (function_exists('curl_init')) {
			throw new CURLNotAvailableException();
		}
		return $this;
	}
	
	/**
	 * Starts the HTTP Request and returns or prints the result
	 * 
	 * 	@param boolean $buffered
	 * 	@param boolean $header return/print response headers as well
	 * 	@return boolean|string
	 */
	public function exec($buffered = true, $headers = false)
	{
		if (!empty($this->data)) {
			if ($this->method === self::METHOD_POST) {
				curl_setopt($this->handle, CURLOPT_POST, true);
				curl_setopt($this->handle, CURLOPT_POSTFIELDS, http_build_query($this->data));
			} else {
				$this->url .= '?'.http_build_query($this->data);
				curl_setopt($this->handle, CURLOPT_HTTPGET, true);
			}
		}
		curl_setopt($this->handle, CURLOPT_FOLLOWLOCATION, (bool) $this->followLocation);
		if (isset($this->timeout)) {
			curl_setopt($this->handle, CURLOPT_TIMEOUT, (int) $this->timeout);
		}
		if (!empty($this->cookie)) {
			curl_setopt($this->handle, CURLOPT_COOKIE, http_build_cookie($this->cookie));
		}
		if ($this->port !== 80) {
			curl_setopt($this->handle, CURLOPT_PORT, (int) $this->port);
		}
		if (!empty($this->referer)) {
			curl_setopt($this->handle, CURLOPT_REFERER, $this->referer);
		}
		if (!empty($this->userAgent)) {
			curl_setopt($this->handle, CURLOPT_USERAGENT, $this->userAgent);
		}
		if (!empty($this->auth)) {
			curl_setopt($this->handle, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($this->handle, CURLOPT_USERPWD, implode(':', $this->auth));
		}
		if (count($this->headers) > 0) {
			curl_setopt($this->handle, CURLOPT_HTTPHEADER, $this->headers);
		}
		if ($buffered) {
			curl_setopt($this->handle, CURLOPT_RETURNTRANSFER, $buffered);
		}
		if ($headers) {
			curl_setopt($this->handle, CURLOPT_HEADER, true);
		}
		// check if url set
		if (empty($this->url)) {
			throw new CURLEmptyURLException();
		}
		curl_setopt($this->handle, CURLOPT_URL, $this->url);
		curl_setopt($this->handle, CURLOPT_COOKIESESSION, true);
		return curl_exec($this->handle);
	}	
}

/**
 * 	@package Franklin
 * 	@subpackage Franklin.Exception
 */
class CURLException extends \Exception {}

/**
 * 	@package Franklin
 * 	@subpackage Franklin.Exception
 */
class CURLNotAvailableException extends CURLException {}

/**
 * 	@package Franklin
 * 	@subpackage Franklin.Exception
 */
class CURLEmptyURLException extends CURLException {}