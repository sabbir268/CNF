<?php
	include('../db/dbconfig.php');
include('../inc/function.php');
if( $_POST ){
	
	$disc_am = test_input($_POST['disc_am']);
	
	$last_bill_id=last_bill();
	
	$sql = $conn->query("CALL update_temp_bill_discount('$last_bill_id','$disc_am',@p_msg)");
	$msg=show_p_o_msg();
	if($sql){
	?>
    	<div class="alert alert-info">
    		<strong>Success</strong> <?php echo $msg;  ?>
    	</div>
   
    <?php
	}
}
?>