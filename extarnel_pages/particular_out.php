<?php 
	include('../db/dbconfig.php');
	include('../inc/function.php');
	
	echo $port_id=last_job_port(); reterve_data_particular($port_id);
	
?>

