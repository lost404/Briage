<?php
	header('Content-type:text/html;charset=utf-8');
	require_once './pinyin.php';
	$a = file_get_contents('a.data');
	$b = json_decode($a, true);
	$data = array();
	foreach($b['data']['info'] as $key => $value){
		array_push($data, $value);
	}
	$pinyin = new Pinyin();
	$count = count($data);
	$name = array();
	$me = abs(crc32('luoyangon'));
	for($i = 0; $i < $count; $i++){
		$temp = '';
		$temp = $pinyin -> output($data[$i]['nick']);
		array_push($name, abs($me-abs(crc32(md5($temp)))));
	}
	$name2 = $name;
	//print_r($name2);
	$name2 = array_flip($name2);  
	sort($name);
	$jiyouid = $name2[$name[0]];
	print_r($data[$jiyouid]);
	//print_r($data);
?>

