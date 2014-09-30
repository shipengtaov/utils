<?php
$source = '1234567890abcdefghijklmnopqrstuvwxyz';
$str = '';
for ($i=0; $i < 10; $i++) { 
	$str .= $source[mt_rand(0, strlen($source)-1)];
}
echo $str;

