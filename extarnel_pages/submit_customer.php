<?php
	include('../db/dbconfig.php');
include('../inc/function.php');
if( $_POST ){
	
	$messers = test_input($_POST['messers']);
	$address = test_input($_POST['address']);
	$lc_no = test_input($_POST['lc_no']);
	$lc_date = test_input($_POST['lc_date']);
	
	$sql = $conn->query("CALL insert_customer('$messers','$address','$lc_no','$lc_date',@p_msg)");
	
	if($sql){
	?>
    <table class="table table-striped" border="0">
    
    <tr>
    <td colspan="2">
    	<div class="alert alert-info">
    		<strong>Success</strong>, New Customr Added Successfully...
    	</div>
    </td>
    </tr>
    
    <tr>
    <td>Messers</td>
    <td><?php echo $messers ?></td>
    </tr>
    
    <tr>
    <td>Address</td>
    <td><?php echo $address ?></td>
    </tr>
    
    <tr>
    <td>LC Number</td>
    <td><?php echo $lc_no; ?></td>
    </tr>
    
    <tr>
    <td>LC Date</td>
    <td><?php echo $lc_date; ?></td>
    </tr>
    </table>
    <?php
	}
}
?>