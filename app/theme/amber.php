body {
	background: #000;
	color: #FDE600;
}
a {
	color: #fff;
}
.TestGroup {
	background-color: #000;
	border: 1px solid #FDE600;
}
.TestGroup h1 {
	color: #FDE600;
	background: transparent;
}
h2 {
	color: #FDE600;
}

<?php

require dirname(__FILE__).'/default.php';

class Theme extends DefaultTheme
{
	public $point = 'FDE600';
	public $text = 'FDE600';
	public $grid = 'DB9300';
	public $line = 'DB9300';
}