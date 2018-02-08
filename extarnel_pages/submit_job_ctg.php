<?php
	include('../db/dbconfig.php');
include('../inc/function.php');
if( $_POST ){
	
	$customer_id = test_input($_POST['customer_id']);
	$port = "2";
	$job_no = test_input($_POST['job_no']);
	$ac = test_input($_POST['ac']);
	$bill_of_entry = test_input($_POST['bill_of_entry']);
	$bill_date = test_input($_POST['bill_date']);
	$desc_good = test_input($_POST['desc_good']);
	$qty = test_input($_POST['qty']);
	$weight = test_input($_POST['weight']);
	$ex_ss = test_input($_POST['ex_ss']);
	$rot_no = test_input($_POST['rot_no']);
	$lin_no = test_input($_POST['lin_no']);
	$arrived_on = test_input($_POST['arrived_on']);
	$track_recipt = "";
	$tr_description = "";
	$exporter = test_input($_POST['exporter']);
	$depot = test_input($_POST['depot']);
	$cnf_value = test_input($_POST['cnf_value']);
	$clearence_date = test_input($_POST['clearence_date']);
	
	if(empty($customer_id)){
		$customer_id=last_customer();
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
    <td>Port</td>
    <td><?php echo $port ?></td>
    </tr>
    
    <tr>
    <td>Job No.</td>
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
    <td>Ex S.S </td>
    <td><?php echo $ex_ss; ?></td>
    </tr>
	
	 <tr>
    <td>Rot Number</td>
    <td><?php echo $rot_no; ?></td>
    </tr>
	
	 <tr>
    <td>Line Number</td>
    <td><?php echo $lin_no; ?></td>
    </tr>
	
	 <tr>
    <td>Arrived On </td>
    <td><?php echo $arrived_on; ?></td>
    </tr>
	
	 <tr>
    <td>Exporter</td>
    <td><?php echo $exporter; ?></td>
    </tr>
	
	 <tr>
    <td>Depot</td>
    <td><?php echo $depot; ?></td>
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
    <?php
	echo $msg;
	}
	else{
			
			echo 'Something Wrong';
	}
}
?>