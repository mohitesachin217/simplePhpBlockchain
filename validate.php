<?php 

$info  = $_POST['info'];

$blockchain = json_decode($info);

$genesis_hash = $s_number = str_pad( "0", 64, "0", STR_PAD_LEFT );

// print_r($blockchain);

 $size  = sizeof($blockchain);

$last_block = $size;


	$validate = "valid";
	foreach($blockchain as $index => $block){
		// echo $index ;
		$block_no = $blockchain[$index]->block_no;
		$nounce = $blockchain[$index]->nounce;
		$data = $blockchain[$index]->data;
		if($index!=0){
			$prev_hash  = $blockchain[$index]->prev_hash;		
		}else{
			$prev_hash  = $genesis_hash;
		}
		

		$hashesh[$index]['str'] = $str = $block_no.$nounce.$data.$prev_hash;

		$hash = hash('sha256',$str);

		while(substr($hash,0,4) !== '0000'){
			$nounce++;
			$str = $block_no.$nounce.$data.$prev_hash;
			$hash = hash('sha256',$str);
		}
		$hashesh[$index]['current_hash'] = $hash;
		if($hash != $blockchain[$index]->current_hash ){
			$validate = 'not valid';
			break;
		}
		// echo $hash." == ". $blockchain[$index]->current_hash;
		// echo "</br/>";
	}


		// print_r($hashesh);
		echo $validate;//$hash = hash('sha256',$str);
	


?>