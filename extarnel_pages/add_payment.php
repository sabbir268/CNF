<?php 
	include('../db/dbconfig.php');
include('../inc/function.php');
	if( $_POST ){
		$bill_id = test_input($_POST['bill_id']);
		$pay_date = test_input($_POST['pay_date']);
		$pay_amount = test_input($_POST['pay_amount']);
	$sql = $conn->query("CALL insert_payment('$bill_id','$pay_amount','$pay_date',@p_msg)");
	if($sql){
	echo show_p_o_msg();
	}
	else{
		echo 'Something wrong';
		}
	}
	?>