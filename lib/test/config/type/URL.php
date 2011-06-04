<?php

namespace Franklin\test\config\type;

class URL extends Mixed
{
	public function buildRegexp(Array $protocols = array())
	{
		if (!empty($protocols)) {
			$protocols = implode('|', $protocols);
		} else {
			$protocols = '[a-z]{1,20}';
		}
		$regexp = '{
			\\b
			  # Match the leading part (proto://hostname, or just hostname)
			  (
			    ('.$protocols.')://[-\\w]+(\\.\\w[-\\w]*)+
			  |
			    # or, try to find a hostname with more specific sub-expression
			    (?i: [a-z0-9] (?:[-a-z0-9]*[a-z0-9])? \\. )+ # sub domains
			    # Now ending .com, etc. For these, require lowercase
			    (?-i: com\\b
			        | edu\\b
			        | biz\\b
			        | gov\\b
			        | in(?:t|fo)\\b # .int or .info
			        | mil\\b
			        | net\\b
			        | org\\b
			        | [a-z][a-z]\\.[a-z][a-z]\\b # two-letter country code
			    )
			  )
			  (:\\d+)?
			  # The rest of the URL is optional, and begins with /
			  (
			    /
			    # The rest are heuristics for what seems to work well
			    [^.!,?;"\'<>()\[\]\{\}\s\x7F-\\xFF]*
			    (
			      [.!,?]+ [^.!,?;"\'<>()\\[\\]\{\\}\s\\x7F-\\xFF]+
			    )*
			  )?
			}ix';
		return $regexp;
	}
	
	public function validate($value)
	{
		return preg_match($this->buildRegexp(array('http', 'https')), $value);
	}
}