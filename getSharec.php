<?php
include ('include.php');
$n = mt_rand(10,100);
//example=>http://jsjs.incocos.com/s2edc82@3fc68f9-86c8efa)ca30af*5a,5dc34;8f9210080388e8b24e4d577acd234f25;19;78cb28ae8a7eaf1684941d49f43200afadvertmbqtihehacrgg
$url = "http://" . strtolower(get_rand_str ( 2, 6 )) . "." . $d2_domain. "/s2".strtolower(get_rand_str ( 5, 5 )) ."@".strtolower(get_rand_str ( 7, 7 ))."-096c8efa)erfeg45*43vdd,".strtolower(get_rand_str ( 5, 6 )).";".get_random_str(16)."acd234f25;$n;".get_random_str(32);
echo json_encode ( array ("v" => $url) );
?>