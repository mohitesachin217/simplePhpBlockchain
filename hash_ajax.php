<?php
	$block_no = $_POST['block_no'];
	$nounce = $_POST['nounce'];
	$data  = $_POST['data'];

	$str = $block_no.$nounce.$data;

	echo $hash = hash('sha256',$str);
?>