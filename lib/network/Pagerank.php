<?php

define('GOOGLE_MAGIC', 0xE6359A60);

class_exists('CURL') or require dirname(__FILE__).'/CURL.php';

/**
 * 	Pagerank class
 * 
 * 	Thanks to http://www.anwaelte-in-vulkane-werfen.de/349/php-klasse-zur-abfrage-des-google-pagerank/
 * 
 * @author Ephigenia // Marcel Eichner <love@ephigenia.de>
 * @since 30.04.2009
 * @package Franklin
 * @subpackage Franklin.Network
 */
class Pagerank
{	
	private function zeroFill($a, $b) {
		$z = hexdec(80000000);
		if ($z & $a) {
			$a = ($a>>1);
			$a &= (~$z);
			$a |= 0x40000000;
			$a = ($a>>($b-1));
		} else {
			$a = ($a>>$b);
		}
		return $a;
	}
	
	private function mix($a,$b,$c) {
		$a -= $b; $a -= $c; $a ^= ($this->zeroFill($c,13));
		$b -= $c; $b -= $a; $b ^= ($a<<8);
		$c -= $a; $c -= $b; $c ^= ($this->zeroFill($b,13));
		$a -= $b; $a -= $c; $a ^= ($this->zeroFill($c,12));
		$b -= $c; $b -= $a; $b ^= ($a<<16);
		$c -= $a; $c -= $b; $c ^= ($this->zeroFill($b,5));
		$a -= $b; $a -= $c; $a ^= ($this->zeroFill($c,3));
		$b -= $c; $b -= $a; $b ^= ($a<<10);
		$c -= $a; $c -= $b; $c ^= ($this->zeroFill($b,15));
		return array($a,$b,$c);
	}
	
	private function GoogleCH($url, $length=null, $init=GOOGLE_MAGIC) {
		if(is_null($length)) {
			$length = sizeof($url);
		}
		$a = $b = 0x9E3779B9;
		$c = $init;
		$k = 0;
		$len = $length;
		while($len >= 12) {
			$a += ($url[$k+0] +($url[$k+1]<<8) +($url[$k+2]<<16) +($url[$k+3]<<24));
			$b += ($url[$k+4] +($url[$k+5]<<8) +($url[$k+6]<<16) +($url[$k+7]<<24));
			$c += ($url[$k+8] +($url[$k+9]<<8) +($url[$k+10]<<16)+($url[$k+11]<<24));
			$mix = $this->mix($a,$b,$c);
			$a = $mix[0]; $b = $mix[1]; $c = $mix[2];
			$k += 12;
			$len -= 12;
		}
		$c += $length;

		switch($len) {
			case 11: $c+=($url[$k+10]<<24);
			case 10: $c+=($url[$k+9]<<16);
			case 9 : $c+=($url[$k+8]<<8);
			case 8 : $b+=($url[$k+7]<<24);
			case 7 : $b+=($url[$k+6]<<16);
			case 6 : $b+=($url[$k+5]<<8);
			case 5 : $b+=($url[$k+4]);
			case 4 : $a+=($url[$k+3]<<24);
			case 3 : $a+=($url[$k+2]<<16);
			case 2 : $a+=($url[$k+1]<<8);
			case 1 : $a+=($url[$k+0]);
		}
		$mix = $this->mix($a,$b,$c);

		return $mix[2];
	}

	private function strord($string) {
		for($i=0;$i<strlen($string);$i++) {
			$result[$i] = ord($string{$i});
		}
		return $result;
	}

	function getrank($url) {
		$url = 'info:'.$url;
		$ch = $this->GoogleCH($this->strord($url));
		$curl = new CURL('http://www.google.com/search?client=navclient-auto&ch=6'.$ch.'&features=Rank&q='.urlencode($url));
		
		$response = trim($curl->exec(true, false));
		var_dump($response);
		$rank = (int) substr(strrchr($response, ':'), 1);
		return $rank;
	}
}
?>