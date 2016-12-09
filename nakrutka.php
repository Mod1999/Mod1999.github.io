<?php
//Токен брать тут u.to/token-vk-dlja-avtostatusa/EnTlBQ
//Токен брать тут u.to/super_access_token/uVy-Bw
$access_token = '092dbf872de3fb9e298e31051cd93efca952e78aa76bb76cef4cbf8bd9c491915ccf6d8b2bd317f477474';

#Дальше лучше не умничать. Не трогать!!!
$attached = array('24261502','52255475','60068119','34985835'); 
$chbad = mt_rand (0, count($attached)-1); 
$паблик = urlencode($attached[$chbad]); 
if($паблик == '24261502'){
$RequestPic = curl('https://api.vk.com/method/groups.getMembers?group_id=24261502&sort=id_desc&fields=online&access_token='.$access_token);
$json123 = json_decode($RequestPic,1);
$объект = $json123['response']['users']['0']['uid'];
}
if($паблик == '52255475'){
$RequestPic = curl('https://api.vk.com/method/groups.getMembers?group_id=52255475&sort=id_desc&fields=online&access_token='.$access_token);
$json123 = json_decode($RequestPic,1);
$объект = $json123['response']['users']['0']['uid'];
}
if($паблик == '60068119'){
$RequestPic = curl('https://api.vk.com/method/groups.getMembers?group_id=60068119&sort=id_desc&fields=online&access_token='.$access_token);
$json123 = json_decode($RequestPic,1);
$объект = $json123['response']['users']['0']['uid'];
}
if($паблик == '34985835'){
$RequestPic = curl('https://api.vk.com/method/groups.getMembers?group_id=34985835&sort=id_desc&fields=online&access_token='.$access_token);
$json123 = json_decode($RequestPic,1);
$объект = $json123['response']['users']['0']['uid'];
}

#Тут текст, но лучше не менять!
$text = 'Привет%20нашёл%20тебя%20в%20группе%20добавь%20в%20друзья)';
#Начинаем работать.
$By133312 = curl('https://api.vk.com/method/friends.add?user_id='.$объект.'&text='.$text.'&access_token='.$access_token);


function curl($url){ 
$ch = curl_init( $url ); 
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false ); 
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false ); 
$response = curl_exec( $ch ); 
curl_close( $ch ); 
return $response; 
}
?><!-- http://vk.com/Almazik2015 -->