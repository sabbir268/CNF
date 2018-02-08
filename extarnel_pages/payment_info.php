<?php
	include('../db/dbconfig.php');
	if( $_GET ){
		$bill_id = $_GET['bill_id'];
	?>
	<style type="text/css"> 
		.none{
		display:none;
		}
		.modal-backdrop.show{
		display:none;
		}
	</style>
	<div class="table-responsive">
		<table class="table ">
			<thead> 
				<tr> 
					<th>SL No.</th>
					<th>Payment Date</th>
					<th>Amount</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$sql=$conn->query("SELECT * FROM payment WHERE bill_id='$bill_id' ");
					$count = $sql->num_rows;
					if( $count > 0 ){
						$i=1;
						while($getrow=$sql->fetch_array()){
							echo '<tr>';
							echo '<td>'. $i .'</td>';
							echo '<td>'. $getrow['pay_date'] .'</td>';
							echo '<td>'. $getrow['amount'] .'</td>';
							echo '<td><button class="btn btn-danger btn-sm delete_btn" value="'.$getrow['pay_id'] .'"><i class="fa fa-trash"></i></button></td>';
							echo'</tr>';
							$i++;
						}
					}
					else{ 
						echo '<tr>';
						echo '<td colspan="4" class="text-center">Not Payment Yet.</td>';
						echo'</tr>';	
					}
				?>
				<tr> 
					<td colspan="2" class="text-center">Total Payment Amount</td>
					<td><?php $sql2=$conn->query("SELECT SUM(amount) FROM payment WHERE bill_id='$bill_id' "); $getrow2=$sql2->fetch_array(); echo $getrow2['SUM(amount)']; ?> </td>
					<td></td>
				</tr>
				<tr> 
					<td colspan="4" class="text-center"><button style="width:100%" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Paymet</button></td>
				</tr>
			</tbody>
		</table>	
	</div>
	
	<button style="opacity:0;" id="btn2" value="<?php echo $bill_id ?>" >make it</button>
</div>

<div style="background-color: #00000038;" class="modal fade" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Add Payment</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body">
					<form id="add_payment"  action="" method="POST"> 
						<input type="text" name="bill_id" value="<?php echo $bill_id;  ?>" hidden />
						<div class="form-group "> 
							<label for="pay_date">Payment Date:</label>
							<input type="date" class="form-control" name="pay_date" />
						</div>
						
						<div class="form-group "> 
							<label for="pay_amount">Amount:</label>
							<input type="number" class="form-control" name="pay_amount" placeholder="Enter Amount" />
						</div>
						<button type="submit" style="width:100%" value="<?php echo $bill_id ?>" class="btn btn-success"  >ADD</button>	
					</form>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cansel</button>
				</div>
			</div>
		</div>
	</div>
	
	
	<?php 
	}
?>



<script type="text/javascript">
	$(document).ready(function() {	
		
		$('#add_payment').submit(function(e){
			e.preventDefault(); // Prevent Default Submission
			$.ajax({
				url: 'extarnel_pages/add_payment.php',
				type: 'POST',
				data: $(this).serialize(), // it will serialize the form data
				cache: false,
				success: function(response) {
					if (confirm(response)){
						document.getElementById("myModal").style.className = "none";
					}
					$("#btn2").click();
				}
			});
			// .done(function(data){
			// //$("respm").html(data);
			// //jQuery("#myModal2").modal('show');
			// alert(data);
			// //$("#myModal2").show();
			// //$("#myModal").css('display:none');
			// })
			// .fail(function(){
			// alert('Ajax Submit Failed ...');	
			// });
		});
	});
</script>

<script type="text/javascript"> 
	$(document).ready(function(){
		// code to get all records from table via select box
		$(".delete_btn").click(function() {
			$.ajax({
				type: "GET",
				url: 'extarnel_pages/delete_paid_amount.php',
				dataType: "html",
				data: {pay_id:$(this).val()},
				cache: false,
				success: function(response) {
					alert(response);
					$("#btn2").click();
				}
			});
		});
	});
</script>

<script type="text/javascript"> 
	$(document).ready(function(){
		// code to get all records from table via select box
		$("#btn2").click(function() {
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


<script type="text/javascript"> 
	$(document).ready(function(){
		// code to get all records from table via select box
		$("#btn2").click(function() {
			$.ajax({
				type: "GET",
				url: 'extarnel_pages/ind_bill_data.php',
				dataType: "html",
				data: {bill_id:$(this).val()},
				cache: false,
				success: function(response) {
					$("#show_data").html(response);
				}
			});
		});
	});
</script>	

