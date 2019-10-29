<?php


$block_no = $_POST['block_no'];
$genesis_hash = $s_number = str_pad( "0", 64, "0", STR_PAD_LEFT );

$prev_hash = $_POST['prev_hash'];

if($block_no == '1'){
	$prev_hash = $genesis_hash;
}

$nounce = $_POST['nounce'];
$data = $_POST['data'];

$str = $block_no.$nounce.$data.$prev_hash;

$hash = hash('sha256',$str);

while(substr($hash,0,4) !== '0000'){
	
	$nounce++;
	$str = $block_no.$nounce.$data.$prev_hash;
	$hash = hash('sha256',$str);
	// echo "<br/>";
	// echo substr($hash,0,4);	
	// if($nounce==1000){
	// 	break;
	// }
}

echo json_encode(array("hash" => $hash,"nounce" => $nounce,"prev_hash" => $prev_hash,"block_no" =>$block_no ));


?> 