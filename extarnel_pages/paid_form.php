<?php
	include('../db/dbconfig.php');
include('../inc/function.php');
if( $_POST ){
	
	$paid_am = test_input($_POST['paid_am']);
	
	$last_bill_id=last_bill();
	
	$sql = $conn->query("CALL update_temp_bill_paid('$last_bill_id','$paid_am',@p_msg)");
	
	if($sql){
	?>
    	<div class="alert alert-info">
    		<strong>Success</strong> <?php show_p_o_msg();  ?>
    	</div>
   
    <?php
	}
}
?>