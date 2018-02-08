<?php 
	include('../db/dbconfig.php');
	include('../inc/function.php');
	if($_POST ){
		$id=$_POST['id'];
		$particilar=$_POST['particilar'];
		$qty=$_POST['qty'];
		$last_bill_id=last_bill();
		
		
		$sql=$conn->query("CALL insert_temp_particular_d('$id','$particilar','$qty','$last_bill_id',@p_msg)");
		$msg=show_p_o_msg();
		
		if($sql){
			?>
			<div class="alert alert-success alert-dismissable ">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<center><strong>Success!</strong> </center>
				<center><h6> <?php   echo $msg;  ?> </h6></center>
			</div>
			<?php
			}
	}
?>

