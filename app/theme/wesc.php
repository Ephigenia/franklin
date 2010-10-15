body {
	font: normal normal normal 1em/1.5em "Helvetica Neue",Arial,Helvetica,sans-serif;
	background-color: #000;
	color: #000;
	margin: 1em;
}
h1 {
	padding: 0.25em;
	margin: 0em;
	background-color: #F9BE07;
}
h2 {
	color: #fff;
}

.TestGroup {
	background-color: #0D0D0D;
	border: 1px solid #F9BE07;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	-khtml-border-radius: 5px;
}
.Tests {
	padding: 0.75em;
}
.number {
	color: #fff;
}
#footer {
	font-size: 0.75em;
}
<?php

require dirname(__FILE__).'/default.php';

class Theme extends DefaultTheme
{
	public $point = 'F9BE07';
	public $text = 'efefef';
	public $grid = 'efefef';
	public $line = 'efefef';
}