<?php 
	$last_bill=last_bill();
	$sql=$conn->query("CALL finalze_cnf('$last_bill',@p_msg)");
	$msg=show_p_o_msg();
	$last_port=last_job_port();
	$last_job = last_job();
	$sql=$conn->query("SELECT * FROM bill GROUP BY bill_id DESC LIMIT 1");
	$getrow=$sql->fetch_array();
	$last_bill_id=$getrow['bill_id'];
	if($sql){
		if ($last_port == 2){
		echo '<script type="text/javascript"> 
		if(confirm("'.$msg.'")){
			window.location.href="final2.php?bill_id='. $last_bill_id .'&job_id='. $last_job .'";
		}
		</script>';
		}
		else{
		echo '<script type="text/javascript"> 
		if(confirm("'.$msg.'")){
			window.location.href="final1.php?bill_id='. $last_bill_id .'&job_id='. $last_job .'";
		}
		</script>';
		}
	}
	else{ 
	echo 'something wrong';
	}
?>