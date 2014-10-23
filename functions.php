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

function time_count_wrapper(callable $fn, $params){
	if(!is_callable($fn)){
		exit($fn . ' is not callable');
	}
	$start = explode(' ', microtime());
	$result = call_user_func_array($fn, $params);
	$end = explode(' ', microtime());
	echo '<div style="background:#808080;padding:2px;position:relative;left:20px;"><code>', $fn, '() 耗时: ', ( ($end[0]+$end[1]) - ($start[0]+$start[1]) ), 's</code></div>';
	return $result;
}
