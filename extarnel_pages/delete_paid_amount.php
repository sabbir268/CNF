<?php 
	include('../db/dbconfig.php');
	include('../inc/function.php');
	
	if( $_GET ){
		$pay_id = $_GET['pay_id'];
		$sql=$conn->query("CALL delete_payment('$pay_id',@p_msg)");
		if ($sql){
			echo show_p_o_msg();
			}
		else{
			echo 'Something Wrong';
			}
		}
	
	?>