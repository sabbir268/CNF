<?php 
	include('../db/dbconfig.php');
	include('../inc/function.php');
	
		echo '<option value="">Select Customer:</option>';
		 query_table('customer_option_view'); 
	
?>

