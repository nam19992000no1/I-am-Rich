<?php
header("Refresh:120");
date_default_timezone_set('asia/ho_chi_minh');

$id = '100000270155390_1039970059440184'; // ID post Status moi nhat
$idgroup = '735969126506947';
$facebook_access_token='EAAAAUaZA8jlABAC3mIy9pVwlDZCZBu4HR8g2D1w9q69PoZBjbJqXCW5Bq4I8ZB4dQyZCn4YoZCMGwh0pB1NH9fhsPQyU0f63eTWTrIZBLfkBE9Xq5lkb78eRrAvBhFPHw2GtyQxccNyZAXlY1usSIpXWJsY5tSFvL0Y2Rf63wf9VPxAZDZD'; // Token full quyen


// -- Ket thúc --

// -- Hàm CURL --
function __Curl($url) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);
$result = curl_exec($ch);
curl_close($ch);
$obj = json_decode($result);
}


// -- Like Đến --
$url = 'https://graph.facebook.com/'.$idgroup.'?fields=feed.limit(300){from,reactions.summary(total_count)},members.limit(500){name}&access_token='.$facebook_access_token; //Token đéo được sửa
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);
$result = curl_exec($ch);
curl_close($ch); 
$obj = json_decode($result);

//for ($x = 0; $x < 5 ; $x++) {

//$tenmember = $obj->members->data[$x]->name;

//$obj->members->data[$x]->id;

$idmember = $obj->members->data[463]->id;
echo "{$idmember}";
for ($y = 0; $y < 900 ; $y++) {
$ids = $obj->feed->data[$y]->from->id;
if ($ids == $idmember) {
$idbaiviet = $obj->feed->data[$y]->id;
$nameshowup = $obj->feed->data[$y]->from->name;
$reaction = $obj->feed->data[$y]->reactions->summary->total_count;
$sumreaction=$sumreaction +$reaction;
echo "{$idbaiviet} {$ids} {$nameshowup} có số like {$reaction} <br>"; 

}
}

echo "{$nameshowup} có tổng {$sumreaction} like <br>";

//}



/*
// -- Thông số mem --
$url = 'https://graph.facebook.com/'.$idgroup.'?fields=members.limit(500){name,updated_time}&access_token='.$facebook_access_token; //Token đéo được sửa
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);
$result = curl_exec($ch);
curl_close($ch);
$obj = json_decode($result);



for ($x = 0; $x < 5 ; $x++) {

$tenmember = $obj->members->data[$x]->name;
$updated_time = $obj->members->data[$x]->updated_time;
$datesac = explode('-',substr($updated_time, 0, -14));
$stringsomething = "{$tenmember} hoạt động lần cuối vào ngày " . $datesac[2] . " tháng " .$datesac[1]. " năm ". $datesac[0] . " vào lúc " . substr($updated_time, 11, -5) ." <br>"; 
sort($updated_time);
echo $stringsomething;
}

*/

// -- Ket thuc --


/*
$likeout=0;
for($x=0;$x<2;$x++){
for($y=0;$y<3;$y++){
$idbaiviet = $obj->feed->data[$x]->reactions->data[$y]->name;
echo "{$idbaiviet} có số like <br>"; 
}
}
*/

// -- Ket thuc --


// Ðây là phần nội dung cập nhật trên Status mới nhất.



//----------------------------------------------------------------------------------------------

/* 

@[{$iidlatestpost}:0.{$namelatestpost}:0]
{$membercount}
return;
-- Code viet, edit status
 $params = array('access_token'=>$facebook_access_token, 'message'=>$status);
$url = "https://graph.facebook.com/".$id;
$ch = curl_init();
curl_setopt_array($ch, array(
	CURLOPT_URL => $url,
	CURLOPT_POSTFIELDS => $params,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_VERBOSE => true
	));
$result = curl_exec($ch); 
-- Ket thuc --
-- Phan code cho comment --

var_dump($result);
 */
?>