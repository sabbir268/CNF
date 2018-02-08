<?php
	include('../db/dbconfig.php');
include('../inc/function.php');
if( $_POST ){
	
	$assessable_value = test_input($_POST['assessable_value']);
	$comission_ass = test_input($_POST['comission_ass']);
	$last_bill_id=last_bill();
	
	$sql = $conn->query("CALL update_temp_bill_accesable_value('$last_bill_id','$assessable_value','$comission_ass',@p_msg)");
	
	if($sql){
	?>
    	<div class="alert alert-info">
    		<strong>Success</strong> <?php echo show_p_o_msg();?>
    	</div>
   
    <?php
	}
}
?>