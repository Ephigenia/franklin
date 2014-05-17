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
	public $defaults = array(
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_TIMEOUT => 5,
		CURLOPT_COOKIE => false,
		// CURLOPT_REFERER => false,
		CURLOPT_USERAGENT => 'franklin website metric recorder',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HEADER => false,
		CURLOPT_COOKIESESSION => true,
		CURLOPT_ENCODING => '', // disable gzip compressed responses
	);
	
	public function __construct(Array $options = array())
	{
		if (!function_exists('curl_init')) {
			throw new CURLNotAvailableException();
		}
		$this->defaults = $options + $this->defaults;
		return $this;
	}
	
	public function get($url = null, $data = array(), Array $options = array())
	{
		if (!empty($data)) {
			$url .= '?';
			if (is_array($data)) {
				$url .= http_build_query($data);
			} else {
				$url .= $data;
			}
		}
		$handle = $this->createHandle($options += array(
			CURLOPT_URL => $url,
			CURLOPT_HTTPGET => true,
		));
		return $this->exec($handle);
	}
	
	public function post($url, $data = array(), $options = array())
	{
		if (empty($url)) {
			throw new CURLEmptyURLException();
		}
		$handle = $this->createHandle($options += array(
			CURLOPT_URL => $url,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $data,
		));
		return $this->exec($handle);
	}
	
	protected function exec($handle)
	{
		$result = curl_exec($handle);
		if (curl_errno($handle)) {
			throw new CURLException(curl_errno($handle).': '.curl_error($handle));
		}
		return $result;
	}
	
	protected function createHandle(Array $options = array())
	{
		if (isset($options[CURLOPT_COOKIE]) && is_array($options[CURLOPT_COOKIE])) {
			$options[CURLOPT_COOKIE] = http_build_cookie($options[CURLOPT_COOKIE]);
		}
		if (isset($options[CURLOPT_POSTFIELDS]) && is_array($options[CURLOPT_POSTFIELDS])) {
			$options[CURLOPT_POSTFIELDS] = http_build_query($options[CURLOPT_POSTFIELDS]);
		}
		$handle = curl_init();
		curl_setopt_array($handle, $options + $this->defaults);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
		return $handle;
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