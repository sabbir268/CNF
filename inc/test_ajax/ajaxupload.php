<?php

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp'); // valid extensions
$path = 'uploads/'; // upload directory

if(isset($_FILES['image']))
{
	$img = $_FILES['image']['name'];
	$tmp = $_FILES['image']['tmp_name'];
		
	// get uploaded file's extension
	$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
	
	// can upload same image using rand function
	$final_image = rand(1000,1000000).$img;
	
	// check's valid format
	if(in_array($ext, $valid_extensions)) 
	{					
		$path = $path.strtolower($final_image);	
			
		if(move_uploaded_file($tmp,$path)) 
		{
			?>
			
		<div class="alert alert-info">
    		<strong>Success</strong> <?php $msg=show_p_o_msg();  ?>
    	</div>
			
			<?php
		}
	} 
	else 
	{
		echo 'invalid';
	}
}


?>