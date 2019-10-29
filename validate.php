<?php 

$info  = $_POST['info'];

$blockchain = json_decode($info);

$genesis_hash = $s_number = str_pad( "0", 64, "0", STR_PAD_LEFT );

// print_r($blockchain);

 $size  = sizeof($blockchain);

$last_block = $size - 1;

	$block_no = $blockchain[$last_block]->block_no;
	$nounce = $blockchain[$last_block]->nounce;
	$data = $blockchain[$last_block]->data;
	$prev_hash  = $blockchain[$last_block-1]->current_hash;	

	$str = $block_no.$nounce.$data.$prev_hash;

	$hash = hash('sha256',$str);

	while(substr($hash,0,4) !== '0000'){
	
	$nounce++;
	$str = $block_no.$nounce.$data.$prev_hash;
	$hash = hash('sha256',$str);
	
}
	echo $hash = hash('sha256',$str);
	


?>