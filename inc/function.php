<?php 
	include('db/dbconfig.php');
	/*============Universal Function Start=========*/
	
	//---- number to word function start-----------
	function numberTowords($num)
	{ 
		$number = $num;
		$no = round($number);
		$point = round($number - $no, 2) * 100;
		$hundred = null;
		$digits_1 = strlen($no);
		$i = 0;
		$str = array();
		$words = array('0' => '', '1' => 'one', '2' => 'two',
		'3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
		'7' => 'seven', '8' => 'eight', '9' => 'nine',
		'10' => 'ten', '11' => 'eleven', '12' => 'twelve',
		'13' => 'thirteen', '14' => 'fourteen',
		'15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
		'18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
		'30' => 'thirty', '40' => 'forty', '50' => 'fifty',
		'60' => 'sixty', '70' => 'seventy',
		'80' => 'eighty', '90' => 'ninety');
		$digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
		while ($i < $digits_1) {
			$divider = ($i == 2) ? 10 : 100;
			$number = floor($no % $divider);
			$no = floor($no / $divider);
			$i += ($divider == 10) ? 1 : 2;
			if ($number) {
				$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
				$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
				$str [] = ($number < 21) ? $words[$number] .
				" " . $digits[$counter] . $plural . " " . $hundred
				:
				$words[floor($number / 10) * 10]
				. " " . $words[$number % 10] . " "
				. $digits[$counter] . $plural . " " . $hundred;
			} else $str[] = null;
		}
		$str = array_reverse($str);
		$result = implode('', $str);
		$points = ($point) ?
		"." . $words[$point / 10] . " " . 
		$words[$point = $point % 10] : '';
		return $result . "Taka  " . $points . " Paisa";
	} 
	//---- number to word function end-----------
	
	//------ input sequrity start----//
	function test_input($data) {
		global $conn;
		$data = trim($data);
		$data=$conn->escape_string($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	//----- input sequrity end-----//
	
	//----- reterve port---//
	function query_table($table_name){
		global $conn;
		$sql=$conn->query("SELECT * FROM $table_name ");
		$count=$sql->field_count;
		while($getrow=$sql->fetch_array()){
			$i=1;
			while($i<$count){
				$j=0;
				while($j<$i){
					echo '<option value=" '. $getrow[$j] .' ">'. $getrow[$i] .'</option>';
					$j++;
				}
				$i++;
			}
		}
	}
	
	
	//-----Output message showing start-----//
	function show_p_msg($redirect){
		global $conn;
		$sqlp=$conn->query("SELECT @p_msg");
		$getmsg=$sqlp->fetch_array();
		$msg=$getmsg['@p_msg'];
		echo '<script type="text/javascript">
		alert(" '. $msg .' ");
		window.location.href="cnf.php?page='. $redirect.'";
		</script>';
	}
	
	//--- only output message without pop up alert -------
	
	function show_p_o_msg(){
		global $conn;
		$sqlp=$conn->query("SELECT @p_msg");
		$getmsg=$sqlp->fetch_array();
		$msg=$getmsg['@p_msg'];
		return $msg;
	}
	
	//------start move particuler and encloser_doc details from temp-------
	
	function finalze_cnf(){
		global $conn;
		$last_bill=last_bill();
		$sql=$conn->query("CALL finalze_cnf('$last_bill',@p_msg)");
	}
	
	// end move particuler and encloser_doc details from temp-----
	
	/* ==========Universal Function End============*/
	
	/* ======function for insert data star========== */
	
	/*start insert into port*/
	function insert_port($portred){
		global $conn;
		//submit from encoles insert interface by super admin
		if(isset($_POST['port_add'])){
			$port=test_input($_POST['port']);
			$port_id=test_input($_POST['port']);
			$sql=$conn->query("CALL insert_port('$port',@p_msg)");
			if($sql){
				show_p_msg($portred);
			}
		}
	}
	/*end insert into port*/
	
	/*start insert into particilar*/
	function insert_particuler($particular){
		global $conn;
		//submit from encoles insert interface by super admin
		if(isset($_POST['particuler_add'])){
			$particuler=test_input($_POST['particuler']);
			$port_id=test_input($_POST['port']);
			$particuler_type=test_input($_POST['particuler_type']);
			if (empty($particuler_type)){
				$particuler_type = NULL ;
			}
			$sql=$conn->query("CALL insert_particular('$particuler','$particuler_type','$port_id',@p_msg)");
			if($sql){
				show_p_msg($particular);
			}
		}
	}
	/*end insert into particilar*/
	
	/*start insert into enclosur doc*/
	function insert_encloser_doc($enc){
		global $conn;
		//submit from encoles insert interface by super admin
		if(isset($_POST['enc_doc_add'])){
			$enc_doc=test_input($_POST['enc_doc']);
			$port_id=test_input($_POST['port']);
			$sql=$conn->query("CALL insert_encloser_doc('$enc_doc','$port_id',@p_msg)");
			if($sql){
				show_p_msg($enc);
			}
		}
	}
	
	// function insert_encloser_doc(){
	// global $conn;
	// //submit from encoles insert interface by super admin
	// if(isset($_POST['add_particular'])){
	// $particular_name=test_input($_POST['particilar']);
	// $qyt=test_input($_POST['qyt']);
	
	// $sql=$conn->query("CALL insert_encloser_doc('$enc_doc','$port_id',@p_msg)");
	// if($sql){
	// show_p_msg($enc);
	// }
	// }
	// }
	
	/* ======function for insert data star========== */
	
	
	/* ======function for reterve data star======== */
	
	//------- last Bill id ----------
	
	function last_bill(){
		global $conn;
		$sql=$conn->query("SELECT * FROM temp_bill GROUP BY bill_id DESC LIMIT 1");
		$getrow=$sql->fetch_array();
		$last_bill_id=$getrow['bill_id'];
		return $last_bill_id;
	}
	
	//--------total bill view--------------
	
	//------- last customer view ----------
	
	function last_customer(){
		global $conn;
		$sql=$conn->query("SELECT * FROM customer GROUP BY customer_id DESC LIMIT 1");
		$getrow=$sql->fetch_array();
		$last_customer_id=$getrow['customer_id'];
		return $last_customer_id;
	}
	
	function last_customer_comp($bill_id){
		global $conn;
		$cust_id=reterve_job_comp($bill_id)['customer_id'];
		$sql=$conn->query("SELECT * FROM customer WHERE customer_id='$cust_id' ");
		$getrow=$sql->fetch_array();
		return $getrow;
	}
	
	
	//--------last customer view--------------
	
	//------- last job view ----------
	
	function last_job(){
		global $conn;
		$sql=$conn->query("SELECT * FROM job GROUP BY job_id DESC LIMIT 1");
		$getrow=$sql->fetch_array();
		$last_job_id=$getrow['job_id'];
		return $last_job_id;
	}
	
	function last_job_port(){
		global $conn;
		$sql=$conn->query("SELECT * FROM job GROUP BY job_id DESC LIMIT 1");
		$getrow=$sql->fetch_array();
		$last_port_id=$getrow['port_id'];
		return $last_port_id;
	}
	
	
	
	//--------last job view End--------------
	
	function total_bill_view(){
		global $conn;
		$sql=$conn->query("SELECT * FROM temp_bill_view GROUP BY bill_id DESC LIMIT 1");
		$getrow=$sql->fetch_array();
		$total_am=$getrow['total_bill'];
		echo $total_am;
	}
	
	function subtotal_bill_view(){
		global $conn;
		$sql=$conn->query("SELECT * FROM temp_bill_view GROUP BY bill_id DESC LIMIT 1");
		$getrow=$sql->fetch_array();
		$total_am=$getrow['sub_total'];
		echo $total_am;
	}
	
	
	//reterve particuler  data
	
	function reterve_data_particular(){
		global $conn;
		$sql=$conn->query("SELECT * FROM  particular ");
		while($getres=$sql->fetch_array()){
		?>
		
		<tr>
			<form class="parti_ind"  method="POST" >
				<td> 
					<?php echo  $getres[1] ?>
				</td>
				
				<td>
					<input type="text" value="<?php echo $getres[0] ?>"  name="id" hidden />
					<input type="text" class="form-control" name="particilar" placeholder="Enter <?php echo  $getres[1] ?> " required />
				</td>
				<td>
					<span class="add"><input style="width:51%;margin-bottom:10px;margin-left: 24%;" class="form-control" type="text" placeholder="Add Quantity" name="qty" value="1" /></span>
					
					<center style="margin-left: 25%;" class="addit"><input  type="button" class="btn btn-info btn-sm pull-left" value="Add Quantity"></center>
					
				</td>
				
				<td> 
					<input type="submit" class="btn btn-info btn-sm part_ind_add" value="ADD">	
				</td>
			</form>
		</tr>
		
		
		<?php
		}
	}
	
	function reterve_data_particular_bv(){
		global $conn;
		$sql=$conn->query("SELECT * FROM  particular WHERE port_id = 1 ");
		while($getres=$sql->fetch_array()){
		?>
		
		<tr>
			<form class="parti_ind"  method="POST" >
				<td> 
					<?php echo  $getres[1] ?>
				</td>
				
				<td>
					<input type="text" value="<?php echo $getres[0] ?>"  name="id" hidden />
					<input type="text" class="form-control" name="particilar" placeholder="Enter <?php echo  $getres[1] ?> " required />
				</td>
				<td>
					<span class="add"><input style="width:51%;margin-bottom:10px;margin-left: 24%;" class="form-control" type="text" placeholder="Add Quantity" name="qty" value="1" /></span>
					
					<center style="margin-left: 25%;" class="addit"><input  type="button" class="btn btn-info btn-sm pull-left" value="Add Quantity"></center>
					
				</td>
				
				<td> 
					<input type="submit" class="btn btn-info btn-sm part_ind_add" value="ADD">	
				</td>
			</form>
		</tr>
		
		
		<?php
		}
	} 
	
	function reterve_data_particular_ctg(){
		global $conn;
		$sql=$conn->query("SELECT * FROM  particular WHERE port_id = 2 ");
		while($getres=$sql->fetch_array()){
		?>
		
		<tr>
			<form class="parti_ind"  method="POST" >
				<td> 
					<?php echo  $getres[1] ?>
				</td>
				
				<td>
					<input type="text" value="<?php echo $getres[0] ?>"  name="id" hidden />
					<input type="text" class="form-control" name="particilar" placeholder="Enter <?php echo  $getres[1] ?> " required />
				</td>
				<td>
					<span class="add"><input style="width:51%;margin-bottom:10px;margin-left: 24%;" class="form-control" type="text" placeholder="Add Quantity" name="qty" value="1" /></span>
					
					<center style="margin-left: 25%;" class="addit"><input  type="button" class="btn btn-info btn-sm pull-left" value="Add Quantity"></center>
					
				</td>
				
				<td> 
					<input type="submit" class="btn btn-info btn-sm part_ind_add" value="ADD">	
				</td>
			</form>
		</tr>
		
		
		<?php
		}
	} 
	
	
	function reterve_job_comp($bill_id){
		global $conn;
		$sql=$conn->query("SELECT * FROM  bill  WHERE bill_id = '$bill_id' ");
		$getres=$sql->fetch_array();
		$job_id = $getres['job_id'];
		$sql2=$conn->query("SELECT * FROM  job  WHERE job_id = '$job_id' ");
		$getres2=$sql2->fetch_array();
		return $getres2;
	}
	
	function reterve_intable_data_particular($port,$particular_type){
		global $conn;
		$sql=$conn->query("SELECT * FROM  particular  WHERE port_id = '$port' and particular_type = '$particular_type' ");
		while($getres=$sql->fetch_array()){
			echo '<h6 style="padding:0px;margin:0px;font-size:14px;">'. $getres[1] .'...........................</h6>';
			
		}
	}
	
	function reterve_intable_data_particular_id($port){
		global $conn;
		$sql=$conn->query("SELECT * FROM  particular  WHERE port_id = '$port' ");
		$getres=$sql->fetch_array();
		$particular_id=$getres['particular_id'];
		return $particular_id;
	}
	
	
	
	
	function reterve_intable_data_particular_am($bill_id){
		global $conn;
		$sql=$conn->query("SELECT * FROM  particular_d WHERE bill_id= $bill_id");
		while($getres=$sql->fetch_array()){
			echo '<h6>'. $getres['amount'] .'</h6>';
			
		}
	}
	
	
	
	//reterve enclosur_doc  data
	function reterve_data_encloser_doc(){
		global $conn;
		$sql=$conn->query("SELECT * FROM  encloser_doc ");
		while($getres=$sql->fetch_array()){
		?>
		
		<tr>
			<form  action="ajaxupload.php" enctype="multipart/form-data" class="enc_doc_ind form_enc"  method="POST" >
				<td> 
					<?php echo  $getres[1] ?>
					<input type="text" value="<?php echo $getres[0] ?>"name="encloser_doc" hidden />
				</td>
				
				<td>
					<input id="uploadImage" type="file" accept="image/*" name="file" />
				</td>
				
				<td> 
					<input type="submit" class="btn btn-info" value="ADD">	
				</td>
			</form>
		</tr>
		<?php
		}
	}
	
	function reterve_intable_data_encloser_doc(){
		global $conn;
		$sql=$conn->query("SELECT * FROM  encloser_doc ");
		while($getres=$sql->fetch_array()){
			
			echo '<h6 style="padding:0px;margin:0px;font-size:14px;">'. $getres[1] .'</h6>';
			
		}
	}
	
	function reterve_intable_from_bill_view($bill_id){
		global $conn;
		$sql=$conn->query("SELECT * FROM  bill_view  WHERE bill_id = '$bill_id' ");
		$getres=$sql->fetch_array();
		return $getres;
	}
	
	
?>
