<?php
$dataArr = include ('data.php');
$d1_domain = $dataArr['d1'];
$d2_domain= $dataArr['d2'];
$d3_domain= $dataArr['d3'];
$d4_domain= $dataArr['d4'];
$d5_domain= $dataArr['d5'];
$back_url = $dataArr['back_url'];
$baidu_id = $dataArr['baidu_id'];
function get_final_domain()
{
	global $final;
	$arr = $final[rand(0,count($final) - 1)];
	return $arr[rand(0,count($arr) - 1)];
}
function strict($str)
{
	if(get_magic_quotes_gpc())
	{
		$str = stripslashes($str);
	}
	$str = str_replace('&#','{vv}',$str);
	$str = str_replace('#','&#35;',$str);
	$str = str_replace('--','-&#45;',$str);
	$str = str_replace('/*','/&#42;',$str);
	$str = str_replace('*/','&#42;/',$str);
	$str = str_replace('<','&#60;',$str);
	$str = str_replace('>','&#62;',$str);
	$str = str_replace('(','&#40;',$str);
	$str = str_replace(')','&#41;',$str);
	$str = str_replace("'",'&#39;',$str);
	$str = str_replace('"','&#34;',$str);
	$str = str_replace('\\','&#92;',$str);
	$str = str_replace('%20','&nbsp;',$str);
	$str = str_replace(chr(13).chr(10),'<br />',$str);
	$str = str_replace('{vv}','&#',$str);
	return $str;
}
function post($val,$filter = 'strict')
{
	return $filter(isset($_POST[$val])?$_POST[$val]:'');
}
function get($val,$filter = 'strict')
{
	return $filter(isset($_GET[$val])?$_GET[$val]:'');
}
function https_request($url,$data = NULL)
{
	$curl = curl_init();
	curl_setopt($curl,CURLOPT_URL,$url);
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
	if (!empty($data))
	{
		curl_setopt($curl,CURLOPT_POST,1);
		curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
		//curl_setopt($curl,CURLOPT_POSTFIELDS,http_build_query($data));
	}
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
	$output = curl_exec($curl);
	curl_close($curl);
	return $output;
}
function get_random_str($len = 32)
{
	$str = '';
	$start = ord('a');
	for($i = 0; $i < $len; $i ++)
	{
		$num = mt_rand($start,$start + 25);
		$str .= chr($num);
	}
	return $str;
}
function get_rand_str($min,$max)
{
	$str = '';
	$rand = rand($min,$max);
	for($i = 0; $i < $rand; $i ++)
	{
		$rand2 = rand(0,1) ? rand(65,90) : rand(97,122);
		$str .= chr($rand2);
	}
	return $str;
}
function cut_str($string,$sublen,$start = 0)
{
	$pr = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
	preg_match_all($pr,$string,$t_string);
	$arr = $t_string[0];
	$arr_len = count($arr);
	for($i = 0; $i < $arr_len; $i ++)
	{
		if($arr[$i] != 'delete')
		{
			if(strlen($arr[$i]) == 1)
			{
				if($i < $arr_len - 1)
				{
					$arr[$i] .= $arr[$i + 1];
					$arr[$i + 1] = 'delete';
				}
			}
		}
	}
	$arr2 = array();
	foreach($arr as $key => $value)
	{
		if($value != 'delete')
		{
			$arr2[] = $value;
		}
	}
	$return = '';
	for($i = $start; $i < $sublen && $i < count($arr2); $i ++)
	{
		$return .= $arr2[$i];
	}
	if(count($arr2) - $start > $sublen)
	{
		return $return.'...';
	}else{
		return $return;
	}
}
function get_domain()
{
	$url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
	if($url != ''){
		$url = str_replace('http://','',$url);
		$arr = explode('/',$url);
		if(count($arr)){
			return $arr[0];
		}
	}
	return '';
}
function get_url_tail()
{
	$url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
	if($url != ''){
		$url = str_replace('http://','',$url);
		$arr = explode('/',$url,2);
		if(count($arr)){
			return $arr[1];
		}
	}
	return $url;
}
function pre($array){
	echo '<pre>';
	var_dump($array);
	echo '</pre>';
	exit;
}

/**
 * ��ȡ��ʵIP
 * @param int $type
 * @param bool $client
 * @return mixed
 */
function get_client_ip($type = 0,$client=true)
{
	$type       =  $type ? 1 : 0;
	static $ip  =   NULL;
	if ($ip !== NULL) return $ip[$type];
	if($client){
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
			$pos    =   array_search('unknown',$arr);
			if(false !== $pos) unset($arr[$pos]);
			$ip     =   trim($arr[0]);
		}elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
			$ip     =   $_SERVER['HTTP_CLIENT_IP'];
		}elseif (isset($_SERVER['REMOTE_ADDR'])) {
			$ip     =   $_SERVER['REMOTE_ADDR'];
		}
	}elseif (isset($_SERVER['REMOTE_ADDR'])) {
		$ip     =   $_SERVER['REMOTE_ADDR'];
	}
	// ��ֹIPα��
	$long = sprintf("%u",ip2long($ip));
	$ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
	return $ip[$type];
}

function GetIpLookup($ip = ''){
	if(empty($ip)){
		return '请输入IP地址';
	}
	$res = https_request('http://ip.taobao.com/service/getIpInfo.php?ip='.$ip);
	$json = json_decode($res,true);
	if($json['code']==0){
		return  array(
				'ip'=>$json['data']['ip'],
				'country'=>$json['data']['country'],
				'region'=>$json['data']['region'],
				'city'=>$json['data']['city']);
	}else{
		return  array(
				'ip'=>null,
				'country'=>null,
				'region'=>null,
				'city'=>null
		);
	}
}

function getFullUrl(){
	# 解决通用问题
	$requestUri = '';
	if (isset($_SERVER['REQUEST_URI'])) {
		$requestUri = $_SERVER['REQUEST_URI'];
	} else {
		if (isset($_SERVER['argv'])) {
			$requestUri = $_SERVER['PHP_SELF'] .'?'. $_SERVER['argv'][0];
		} else if(isset($_SERVER['QUERY_STRING'])) {
			$requestUri = $_SERVER['PHP_SELF'] .'?'. $_SERVER['QUERY_STRING'];
		}
	}
	//    echo $requestUri.'<br />';
	$scheme = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
	$protocol = strstr(strtolower($_SERVER["SERVER_PROTOCOL"]), "/",true) . $scheme;
	//端口还是蛮重要的，毕竟需要兼容特殊的场景
	$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
	# 获取的完整url
	$_fullUrl = $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $requestUri;
	return $_fullUrl;
}
?>