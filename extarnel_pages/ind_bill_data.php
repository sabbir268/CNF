<?php 
	include('../db/dbconfig.php');
	if($_GET){
		$customer_id=$_GET['customer_name'];
		$bill_id = $_GET['bill_id'];
		if(empty($customer_id) and !empty($bill_id)){
			$sql2=$conn->query("SELECT * FROM bill_view WHERE bill_id='$bill_id' ");
			$getrow2=$sql2->fetch_array();
			$customer_id=$getrow2['customer_id'];
			}
	?>
	<div class="table-responsive">
	<table class="table table-bordered form-custom">
		<thead> 
			<tr> 
				<th>SL No.</th>
				<th>Bill No.</th>
				<th>LC No.</th>
				<th>Total Bill</th>
				<th>Paid Amount</th>
				<th>Due</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$sql=$conn->query("SELECT * FROM bill_view WHERE customer_id='$customer_id' ");
			$count = $sql->num_rows;
			if($count > 0){
			while($getrow=$sql->fetch_array()){
				echo '<tr>';
				echo '<td>'. $getrow['bill_id'] .'</td>';
				echo '<td>'. $getrow['bill_no'] .'</td>';
				echo '<td>'. $getrow['bill_lc'] .'</td>';
				echo '<td>'. $getrow['sub_total'] .'</td>';
				echo '<td>'. $getrow['paid_am'] .'</td>';
				echo '<td>'. $getrow['due'] .'</td>';
				echo '<td><button class="btn btn-success btn-sm view_btn" value="'.$getrow['bill_id'].'">View</button></td>';
				echo'</tr>';
			}
			}
			else{ 
			echo '<tr>';
				echo '<td colspan="7" class="text-center">No Billing Info Found.</td>';
			echo'</tr>';
			}
		?>
		</tbody>
	</table>	
	</div>
	<?php 
	}
		?>
		
<script type="text/javascript"> 
		$(document).ready(function(){
			// code to get all records from table via select box
			$(".view_btn").click(function() {
				$.ajax({
					type: "GET",
					url: 'extarnel_pages/payment_info.php',
					dataType: "html",
					data: {bill_id:$(this).val()},
					cache: false,
					success: function(response) {
						$("#show_pay_data").html(response);
					}
				});
			});
		});
	</script>