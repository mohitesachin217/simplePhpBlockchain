<!-- <link rel='stylesheet' href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script> -->
<script src="jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
 
	table{
		width:25%;
		border:1px solid #ccc;
		float:left;
		margin:10px;
	}
	td{
		border:1px solid #ccc;
	}
	.hash_container{
		background:#ccc;
		font-size:12px;
		text-align:center;
	}
	.blockchain-wrapper{
		width:100%;
	}
	.mine{
		color:black;
	}
	#validate{
		font-size:30px;
		color:black;
	}
</style>
<center><input type="button" id="validate"  value="validate blockchain" data-count="3"  /></center>
	
<div class="blockchain-wrapper">
	<div class="row">
		<div class="col-md-4">
			<table class="table">
				<thead></thead>
				<tbody>
					<tr>
						<td>Block</td>
						<td><input type="text" class="input form-control" name="block_no" id='block_no1' value="1"  data-id="1"/></td>
					</tr>
					<tr>
						<td>Nounce</td>
						<td><input type="text" class="input  form-control" name="nounce" id="nounce1" data-id="1"/></td>
					</tr>
					<tr>
						<td>Data</td>
						<td><textarea rows="10" cols="40" type="text" class="form-control" name="data" id="data1" data-id="1"/></textarea></td>
					</tr>
					<tr>
						
						<td class="hash1 hash_container" colspan="2" > </span></td>
					</tr>
					<tr>
						<td class="vhash1 hash_container" colspan="2" > </span></td>
					</tr>
					<td colspan="2" align="center">
						<input type="button" value="Mine" class="mine " data-block-id="1"/>
					</td>
				</tbody>
			</table>
		</div>
		<div class="col-md-4">
			<table class="table">
				<thead></thead>
				<tbody>
					<tr>
						<td>Block</td>
						<td><input type="text" class="input form-control" name="block_no" id='block_no2' value="2" data-id="2" /></td>
					</tr>
					<tr>
						<td>Nounce</td>
						<td><input type="text" class="input form-control" name="nounce" id="nounce2" data-id="2" /></td>
					</tr>
					<tr>
						<td>Data</td>
						<td><textarea type="text" rows="10" cols="40" class="form-control" name="data" id="data2" data-id="2" /></textarea></td>
					</tr>
					<tr>
						
						<td class="hash2 hash_container" colspan="2" > </span></td>
					</tr>
					<tr>
						<td class="vhash2 hash_container" colspan="2" > </span></td>
					</tr>
					<td colspan="2" align="center">
						<input type="button" value="Mine" class="mine "  data-block-id="2"/>
					</td>
				</tbody>
			</table>
		 </div>
		<div class="col-md-4">
			<table class="table">
				<thead></thead>
				<tbody>
					<tr>
						<td>Block</td>
						<td><input type="text" class="input form-control" name="block_no" id='block_no3' value="3" data-id="3" /></td>
					</tr>
					<tr>
						<td>Nounce</td>
						<td><input type="text" class="input form-control" name="nounce" id="nounce3" data-id="3" /></td>
					</tr>
					<tr>
						<td>Data</td>
						<td><textarea  rows="10" cols="40" class="form-control"  name="data" id="data3" data-id="3" /></textarea></td>
					</tr>
					<tr>
						<td class="hash3 hash_container" colspan="2" > </span></td>
					</tr>
					<tr>
						<td class="vhash3 hash_container" colspan="2" > </span></td>
					</tr>
					<td colspan="2" align="center">
						<input type="button" value="Mine" class="mine "  data-block-id="3"/>
					</td>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script >
	$(document).ready(function(){
		$(".input").on("keyup",function(){
			var id = $(this).attr('data-id');
			var block_no = $('#block_no' + id).val();
			var nounce = $('#nounce' + id).val();
			var data = $('#data' + id).val();

			var str = block_no + nounce + data;

			$.ajax({
				url:'hash_ajax.php',
				data:{str:str,block_no:block_no,nounce:nounce,data:data},
				method:"POST",
				success:function(data){
					$(".hash" + id ).text(data);
					console.log(data);
				}
			});
		});

		$(document).on("click",".mine",function(){
			var block_no = $(this).attr("data-block-id");
			var nounce = $('#nounce' + block_no).val();
			var data = $('#data' + block_no).val();
			var str =".hash"+ block_no ;
			var vstr =".vhash"+ block_no ;

			block_no = parseInt(block_no);
			// alert(block_no);
			 
			if(block_no > 1){
				var prev_block_no = block_no-1;
			}

			var next_vhash = block_no+1;
			var nvstr =".vhash"+ next_vhash ;
			// var vstr =".vhash"+ block_no ;
			var prev_hash = $(".hash"+ prev_block_no ).text();
			// var str = block_no + nounce + data;

			$.ajax({
				url:'blockchain_mine.php',
				data:{prev_hash:prev_hash,block_no:block_no,nounce:nounce,data:data},
				method:"POST",
				dataType:"JSON",
				success:function(data){
						
					// alert(str);
					$(str).text(data.hash);
					$(nvstr).text(data.hash);
					$(vstr).text(data.prev_hash);

					$("#nounce" + block_no).val(data.nounce);
					console.log(data);
				}
			});
		});
	});

	$(document).on('click',"#validate",function(){
		var count = $(this).attr('data-count');
		count = parseInt(count);
		var blockchain = [];
		// blockchain.length = count; 
		var i = 1;
		// alert(i);
		while(i != 4){
			// alert(is);
			var block_no = $('#block_no' + i).val();
			var nounce = $('#nounce' + i).val();
			var data = $('#data' + i).val();
			var current_hash = $('.hash' + i).text();
			var prev_hash = $('.vhash' + i).text();
			blockchain.push({
				"block_no" : block_no,
				"nounce" : nounce,
				"data" : data,
				"current_hash" : current_hash,
				'prev_hash' : prev_hash,
			}); 
			i++;
		}
		// console.log(blockchain);
		var info = JSON.stringify(blockchain);
		$.ajax({
			url:"validate.php",
			method:"POST",
			data:{info:info},
			success:function(data){
				console.log(data);

				/* if($('.hash' + count).text() == data){
					alert('blockchain is valid');
				}else{
					alert('blockchain is not valid');
				}/*/
			}
		})
		
	});
</script>