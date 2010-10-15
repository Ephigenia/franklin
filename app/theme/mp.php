body {
	background-color: #E4E4E4;
}
h1, h2, a, .number {
	color: #263F70;
}
.TestGroup {
	border: 1px solid #20345D;
	background-color: #fff;
}
.TestGroup h1 {
	color: #fff;
	background: #263F70;
	background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(##263F70), to(#1C2C4D));
	background: -moz-linear-gradient(270deg, ##263F70, #1C2C4D);
}
<?php

class_exists('DefaultTheme') or require dirname(__FILE__).'/default.php';

class Theme extends DefaultTheme
{
	public $point = '20345D';
	
	public $text = '30303F';
	
	public $grid = '30303F';
	
	public $line = '6C6C6C';
}