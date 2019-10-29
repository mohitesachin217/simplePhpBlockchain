<?php


$block_no = $_POST['block_no'];
$nounce = $_POST['nounce'];
$data  = $_POST['data'];

$str = $block_no.$nounce.$data;

$hash = hash('sha256',$str);

while(substr($hash,0,4) !== '0000'){
	
	$nounce++;
	$str = $block_no.$nounce.$data;
	$hash = hash('sha256',$str);
	// echo "<br/>";
	// echo substr($hash,0,4);	
	// if($nounce==1000){
	// 	break;
	// }
}

echo json_encode(array("hash" => $hash,"nounce" => $nounce));


?>