body {
	background-color: #131313;
}
h1, h2, a, .number {
	color: #6D6E6D;
}
h2 {
	color: #919191;
	text-shadow: 0px 1px 0px #000000;
}
div.number .number {
	text-shadow: 0px 1px 10px #000000;
}
.TestGroup {
	border-left: 1px solid #292929;
	border-top: 1px solid #262626;
	border-bottom: 1px solid #131313;
	border-right: 1px solid: #2A2A2A;
	background: #151515;
	background: -webkit-gradient(
	    linear,
	    left top,
	    left bottom,
	    color-stop(0, #313131),
	    color-stop(1, #161616)
	);
	background: -moz-linear-gradient(
	    center top,
	    #313131 0%,
	    #161616 100%
	);
	-moz-box-shadow: 0px 0px 5px #000;
	-webkit-box-shadow: 0px 0px 5px #000;
	box-shadow: 0px 0px 10px #000;
}
.Test {
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	-khtml-border-radius: 5px;
	border-left: 1px solid #404040;
	border-top: 1px solid #191919;
	border-bottom: 1px solid #262626;
	border-right: 1px solid: #404040;
	-moz-box-shadow:inset 0px 0px 11px #000;
	-webkit-box-shadow:inset 0 0 5px #000;
	box-shadow:inset 0 0 5px #000;
	padding: 0.5em 0.75em;
	background: -webkit-gradient(
	    linear,
	    left top,
	    left bottom,
	    color-stop(0, #1A1A1A),
	    color-stop(1, #0F0F0F)
	);
	background: -moz-linear-gradient(
	    center top,
	    #1A1A1A 0%,
	    #0F0F0F 100%
	);
}
.TestGroup h1 {
	color: #CFCFCF;
	background: transparent;
	text-shadow: 0px 1px 5px #000000;
}
<?php

class_exists('DefaultTheme') or require dirname(__FILE__).'/default.php';

class Theme extends DefaultTheme
{
	public $point = 'F69A00';
	
	public $text = 'CFCFCF';
	
	public $line = '4A4A4C';
}