<?php
	include('../db/dbconfig.php');
include('../inc/function.php');
if( $_POST ){
	
	$bill_number = test_input($_POST['bill_number']);
	$bill_date = test_input($_POST['bill_date']);
	$job_number = last_job();
	$accesable_value= null ;
	$comission_acc= null ;
	$discount= null ;
	$paid_am= null ;
	
	$sql = $conn->query("CALL insert_temp_bill('$bill_number','$bill_date','$accesable_value','$comission_acc','$discount','$paid_am','$job_number',@p_msg)");

	
	$sql2=$conn->query('SELECT @p_msg');
	$getmsg=$sql2->fetch_array();
	$msg=$getmsg['@p_msg'];
	
	 if($sql){
	?>
    <table class="table table-striped" border="0">
    
    <tr>
    <td colspan="2">
    	<div class="alert alert-info">
    		<strong>Success</strong>, <?php echo $msg; ?>
    	</div>
    </td>
    </tr>
    
    <tr>
    <td>Bill Number</td>
    <td><?php echo $bill_number ?></td>
    </tr>
    
    <tr>
    <td>Bill Date</td>
    <td><?php echo $bill_date ?></td>
    </tr>
    
    <tr>
    <td>Job No.</td>
    <td><?php echo $job_number; ?></td>
    </tr>
    </table>
    <?php
	}
	else{
			
			echo 'Something Wrong';
	}
}
?>