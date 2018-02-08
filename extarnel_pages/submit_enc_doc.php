<?php
	include('../db/dbconfig.php');
	include('../inc/function.php');
	$encloser_doc=$_POST['encloser_doc'];
	$last_bill_id=last_bill();
	
	/*------------------------- Image resizer Start -------------*/
$upload_image = $_FILES["file"]["name"];

	$folder = "/xampp/htdocs/cnf/CNF/uploads/";

	move_uploaded_file($_FILES["file"]["tmp_name"], "$folder".$_FILES["file"]["name"]);

	$file = '/xampp/htdocs/inex_tracking/uploads/'.$_FILES["file"][" name"];
	
	$uploadimage = $folder.$_FILES["file"]["name"];
	$newname = $_FILES["file"]["name"];

	// Set the resize_image name
	$resize_image = $folder.$newname; 
	$actual_image = $folder.$newname;

	// It gets the size of the image
	list( $width,$height ) = getimagesize( $uploadimage );


// It makes the new image width of 250
	$newwidth = 250;


	// It makes the new image height of 250
	$newheight = 250;


	// It loads the images we use jpeg function you can use any function like imagecreatefromjpeg
	$thumb = imagecreatetruecolor( $newwidth, $newheight );
	$source = imagecreatefromjpeg( $resize_image );


	// Resize the $thumb image.
	imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);


	// It then save the new image to the location specified by $resize_image variable

	imagejpeg( $thumb, $resize_image, 60 ); 

	// 100 Represents the quality of an image you can set and ant number in place of 100.
	$out_image=addslashes(file_get_contents($resize_image));
	
	/*------------------------- Image resizer End-------------*/
	
	
	$sql=$conn->query("CALL insert_temp_encloser_doc_d('$encloser_doc','$upload_image','$last_bill_id',@p_msg)");
	$msg = show_p_o_msg();
				if($sql){
				?>
				<div class="alert alert-info">
					<strong>Success,</strong> <?php echo $msg;  ?>
				</div>
				<?php 
				}
				else{
					echo 'something wrong';
					}
	
	
	
?>

