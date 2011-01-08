body {
	background: #000;
	color: #fff;
}
a {
	color: #fff;
}
.TestGroup {
	background-color: #0B0B0B;
	border: 1px solid #262626;
}
.TestGroup h1 {
	background: #262626;
}
h2 {
	color: #efefef;
}

<?php

require dirname(__FILE__).'/default.php';

class Theme extends DefaultTheme
{
	public $point = 'F69400';
	public $text = 'fefefe';
	public $line = '50A0FA';
}