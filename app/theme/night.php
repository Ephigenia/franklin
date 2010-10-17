body {
	background: #120000;
}
a, h1, h2, body {
	color: #CA0000;
}
.TestGroup {
	background-color: #000000;
	border: 1px solid #CA0000;
}
<?php

require dirname(__FILE__).'/default.php';

class Theme extends DefaultTheme
{
	public $point = 'ff0000';
	public $text = 'CA0000';
	public $line = '970000';
}