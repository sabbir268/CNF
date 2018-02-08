<?php
	include('../db/dbconfig.php');
	include('../inc/function.php');
	if( $_POST ){
		
		$customer_id = test_input($_POST['customer_id']);
		$port = "1";
		$job_no = test_input($_POST['job_no']);
		$ac = test_input($_POST['ac']);
		$bill_of_entry = test_input($_POST['bill_of_entry']);
		$bill_date = test_input($_POST['bill_date']);
		$desc_good = test_input($_POST['desc_good']);
		$qty = test_input($_POST['qty']);
		$weight = test_input($_POST['weight']);
		$ex_ss = "";
		$rot_no = "";
		$lin_no = "";
		$arrived_on = "";
		$track_recipt = test_input($_POST['track_recipt']);
		$tr_description = test_input($_POST['tr_description']);
		$exporter = test_input($_POST['exporter']);
		$depot = "";
		$cnf_value = test_input($_POST['cnf_value']);
		$clearence_date = test_input($_POST['clearence_date']);
		
		if(empty($customer_id)){
			$customer_id = last_customer();
		}
		
		$sql = $conn->query("CALL insert_job('$job_no','$ac','$bill_of_entry','$bill_date','$desc_good','$qty','$weight','$ex_ss','$rot_no','$lin_no','$arrived_on','$track_recipt','$tr_description','$exporter','$depot','$cnf_value','$clearence_date','$customer_id','$port',@p_msg)");
		
		$sql2=$conn->query('SELECT @p_msg');
		$getmsg=$sql2->fetch_array();
		$msg=$getmsg['@p_msg'];
		
		if($sql){
		?>
		<table class="table table-striped" border="0">
			
			<tr>
				<td colspan="2">
					<div class="alert alert-info">
						<strong>Success</strong>, Job Details Successfully Added...
					</div>
				</td>
			</tr>
			
			<tr>
				<td>Customer Id</td>
				<td><?php echo $customer_id ?></td>
			</tr>
			
			<tr>
				<td>Ref. No.</td>
				<td><?php echo $job_no; ?></td>
			</tr>
			
			<tr>
				<td>A/c.</td>
				<td><?php echo $ac; ?></td>
			</tr>
			
			<tr>
				<td>Bill Of entry</td>
				<td><?php echo $bill_of_entry; ?></td>
			</tr>
			
			<tr>
				<td>Bill Date</td>
				<td><?php echo $bill_date; ?></td>
			</tr>
			
			<tr>
				<td>Description Of Goods</td>
				<td><?php echo $desc_good; ?></td>
			</tr>
			
			<tr>
				<td>Quantity</td>
				<td><?php echo $qty; ?></td>
			</tr>
			
			<tr>
				<td>Weight</td>
				<td><?php echo $weight; ?></td>
			</tr>
			
			<tr>
				<td>Track Recipt</td>
				<td><?php echo $track_recipt; ?></td>
			</tr>
			
			<tr>
				<td>Track Recipt Description</td>
				<td><?php echo $tr_description; ?></td>
			</tr>
			
			<tr>
				<td>Exporter</td>
				<td><?php echo $exporter; ?></td>
			</tr>
			
			
			<tr>
				<td>C & F Value</td>
				<td><?php echo $cnf_value; ?></td>
			</tr>
			
			<tr>
				<td>Clearence Date</td>
				<td><?php echo $clearence_date; ?></td>
			</tr>
			
		</table>
		<?php echo $msg; ?>
		<?php
		}
		else{
			
			echo 'Something Wrong';
		}
	}
?>