body, h1, h2, .number, a {
	color: #FDE600;
}
body {
	background: #000;
}
.TestGroup {
	background-color: #070700;
	border: 1px solid #FDE600;
}
<?php

require dirname(__FILE__).'/default.php';

class Theme extends DefaultTheme
{
	public $point = 'FDE600';
	public $text = 'FDE600';
	public $line = 'DB9300';
}