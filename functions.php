<?php
function p($var, $var_dump = False, $halt = False){
	echo '<div><pre>';
	print_r($var);
	if($var_dump){
		echo '<hr/>';
		var_dump($var);
	}
	echo '</pre></div>';
	if($halt)
		exit;
}

function array_htmlspecialchars($arr){
	if(is_string($arr)){
		$arr = htmlspecialchars($arr);
		return $arr;
	} else {
		foreach ($arr as $k => $v) {
			$arr[$k] = array_htmlspecialchars($v);
		}
	}
	return $arr;
}
