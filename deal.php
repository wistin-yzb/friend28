<?php
date_default_timezone_set('PRC');
set_time_limit(30);
include('include.php');
$res = post('res');

$json = file_get_contents('r.txt');
if($json != '')
{
	$arr = json_decode($json,true);
}else{
	// 	file_put_contents('error.txt',"1\n",FILE_APPEND);
	// 	exit();
	$res = $res != '' ? $res : 'other';
	$arr[$res][0] = isset($arr[$res][0]) ? $arr[$res][0] : 0;
	$arr[$res][0] ++;
	$time = strtotime(date('Y-m-d H:00:00'));
	$arr[$res][$time] = isset($arr[$res][$time]) ? $arr[$res][$time] : 0;
	$arr[$res][$time] ++;
	$json = json_encode($arr);
	if(strlen($json) > 10)
	{
		file_put_contents('r.txt',$json);
	}
	exit();
}
if(is_array($arr))
{
	$res = $res != '' ? $res : 'other';
	$arr[$res][0] = isset($arr[$res][0]) ? $arr[$res][0] : 0;
	$arr[$res][0] ++;
	//////////////////////////////
	$time = strtotime(date('Y-m-d H:00:00'));
	$arr[$res][$time] = isset($arr[$res][$time]) ? $arr[$res][$time] : 0;
	$arr[$res][$time] ++;
	//////////////////////////////
	$json = json_encode($arr);
	if(strlen($json) > 10)
	{
		file_put_contents('r.txt',$json);
	}
}else{
	file_put_contents('error.txt',"2\n",FILE_APPEND);
}
?>