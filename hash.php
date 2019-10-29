<!-- <link rel='stylesheet' href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script> -->
<script src="jquery.min.js"></script>
<style>
	input,textarea{
		line-height:60px;
		height:60px;
		width :100%;
		font-size:40px;
	}
	table{
		width:50%;
		border:1px solid #ccc;
	}
	td{
		border:1px solid #ccc;
	}
	#hash{
		background:yellow;
	}
</style>

<center>
	<table>
		<thead></thead>
		<tbody>
			<tr>
				<td>Block</td>
				<td><input type="text" class="input" name="block_no" id='block_no' value="1" /></td>
			</tr>
			<tr>
				<td>Nounce</td>
				<td><input type="text" class="input" name="nounce" id="nounce" /></td>
			</tr>
			<tr>
				<td>Data</td>
				<td><textarea type="text" class="input" name="data" id="data" /></textarea>
			</tr>
			<tr>
				<td>Hash</td>
				<td id="hash"><input type="text" id="hash" value="" /></span></td>
			</tr>
			<td>
				<input type="button" value="Mine" id="mine"/>
			</td>
		</tbody>
	</table>
</center>

<script >
	$(document).ready(function(){
		$(".input").on("keyup",function(){
			var block_no = $('#block_no').val();
			var nounce = $('#nounce').val();
			var data = $('#data').val();

			var str = block_no+nounce+data;

			$.ajax({
				url:'hash_ajax.php',
				data:{str:str,block_no:block_no,nounce:nounce,data:data},
				method:"POST",
				success:function(data){
					$("#hash").text(data);
					console.log(data);
				}
			});
		});

		$("#mine").on("click",function(){
			var block_no = $('#block_no').val();
			var nounce = $('#nounce').val();
			var data = $('#data').val();

			var str = block_no+nounce+data;

			$.ajax({
				url:'hash_mine.php',
				data:{str:str,block_no:block_no,nounce:nounce,data:data},
				method:"POST",
				dataType:"JSON",
				success:function(data){
					// $("#hash").val('');	
					$("#hash").text(data.hash);
					$("#nounce").val(data.nounce);
					// console.log(data);
				}
			});
		});
	});
</script>