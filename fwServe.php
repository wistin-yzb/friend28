<?php
include ('include.php');
require_once  "./wechat/jssdk.php";
$config = [
		'app_id' => $dataArr['app_id'],
		'app_secret' => $dataArr['app_secret']
];
@$jssdk = new JSSDK($config['app_id'], $config['app_secret']);
@$signPackage = $jssdk->GetSignPackage($_REQUEST['url']);
$config = array(
		'debug'=>false,
		'appId'=>$signPackage['appId'],
		'jsApiList'=>array(
				'onMenuShareTimeline',
				'onMenuShareAppMessage',
				'hideOptionMenu',
				'showOptionMenu',
				'hideMenuItems',
				'showMenuItems',
				'closeWindow'
		),
		'nonceStr'=> $signPackage['nonceStr'],
		'rawString'=> $signPackage['rawString'],
		'signature'=>$signPackage['signature'],
		'timestamp'=>$signPackage['timestamp'],
		'url'=>$signPackage['url']
); 
echo  json_encode($config);