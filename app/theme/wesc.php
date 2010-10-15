body {
	font: normal normal normal 1em/1.5em "Helvetica Neue",Arial,Helvetica,sans-serif;
	background-color: #000;
	color: #fff;
}
a, .number {
	color: #fff;
}
.TestGroup {
	background-color: #0D0D0D;
	border: 1px solid #F9BE07;
}
.TestGroup h1 {
	text-transform: uppercase;
	color: #000;
	background: #F9BE07;
}
h2 {
	color: #fff;
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