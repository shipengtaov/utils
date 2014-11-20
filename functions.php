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

/**
 * $filepath => __FILE__
 */
function __main__( $filepath ){
	$include_files = get_included_files();
	return $filepath == $include_files[0];
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

function time_count_wrapper(callable $fn, $params = array(), $print_direct = True){
	global $print_call_info;

	// print_r($print_call_info);

	if(!is_callable($fn)){
		exit($fn . ' is not callable');
	}
	$start = explode(' ', microtime());
	$result = call_user_func_array($fn, $params);
	$end = explode(' ', microtime());
	$msg = '<div style="background:#808080;padding:2px;margin:2px;position:relative;left:20px;">';
	$msg .= '<code>';
	$msg .= $fn . '() takes: ' . ( ($end[0]+$end[1]) - ($start[0]+$start[1]) ) . 's';
	$msg .= '</code>';
	$msg .= '</div>';
	if($print_direct){
		echo $msg;
	}
	$print_call_info .= $msg;
	return $result;
}

if(!empty($debug) && $debug == 1){
	register_shutdown_function('print_call_info');
}

function print_call_info(){
	global $print_call_info;
	echo $print_call_info;
}
