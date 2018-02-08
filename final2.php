<?php 
	//include('header.php'); 
	include('inc/function.php');
	
	if ($_GET['bill_id']){
		$bill_id = $_GET['bill_id'];
		//$job_id = $_GET['job_id'];
	?>
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css" media="print">
		#printLink , .navbar-brand {display : none}
		@page 
		{
		size:  auto;   /* auto is the initial value */
		margin: 0mm;  /* this affects the margin in the printer settings */
		}
		
		html
		{
		background-color: #FFFFFF; 
		margin: 10px;  /* this affects the margin on the html before sending to printer */
		
		}
		
		body
		{
		/* border: solid 1px blue ;
		margin: 10mm 15mm 10mm 15mm;  margin you want for the content */
		margin-top:0px;
		}
		.job_discription>h6>span{
		margin-right:100px;
		padding:10px;
		floa:right;
		}
	</style>
	<style type="text/css"> 
	body{
	background-color:#000;
	}
	.main_part{
	background-color:#fff;
	}
		#printLink{
			cursor:pointer;
		}
		.job_discription>h6{
		padding:0px !important;
		margin:0px !important;
		}
		.cardss{
		border:0.5px solid #000;
		border-radius:5px;
		}
		.brand_heading>h1,h5,h6{
		padding:0px !important;
		margin:0px !important;
		}
		table{
		width:100%;
		}
		table, thead, th ,tr , td{
		border:1px solid;
		}
		
	</style>
	
	<div style="margin-bottom:10px;" class="col-md-8  offset-md-2 main_part">
		<center class="brand_heading">
			<h6><u>BILL</u></h6>
			<h1>Sourobh Enterprise</h1>
			<h5>Govt. Authorized Customs Clearing & Forwarding Agent</h5>
		</center>
		
		<div class="row">
			<div class="floa-left job_discription col-md-12">
				<h6>Job No. <strong><?php echo reterve_job_comp($bill_id)['job_no']; ?></strong><span style="margin-right:50px;padding:10px;" class="cardss float-right"><?php echo reterve_intable_from_bill_view($bill_id)['bill_no']; ?></span></h6>
				<h6>Messers: <strong><?php echo last_customer_comp($bill_id)['messers']; ?></strong></h6>
				<h6>Address: <strong><?php echo last_customer_comp($bill_id)['address'];  ?></strong></h6>
				<h6>A/C: <strong><?php echo reterve_job_comp($bill_id)['ac'];   ?></strong><span style="margin-right:10px;" class="float-right">Date:- <?php echo reterve_intable_from_bill_view($bill_id)['bill_date']; ?></span></h6>
				<h6>Bill Of Entry No. <strong><?php echo reterve_job_comp($bill_id)['bill_of_entry']; ?></strong> Dt. <strong><?php echo reterve_job_comp($bill_id)['date_of_bill']; ?></strong> L/C No. <strong><?php echo last_customer_comp($bill_id)['lc_no']; ?></strong> Dt. <strong><?php echo last_customer_comp($bill_id)['lc_date']; ?></strong></h6>
				<h6>Discription Of Goods: <strong><?php echo reterve_job_comp($bill_id)['disc_goods'];  ?></strong> Quantity: <strong><?php echo reterve_job_comp($bill_id)['quantity'];  ?></strong></h6>
			</div>
			
		</div>
		<br />
		<table > 
			<thead>
				<tr class="text-center">
					<th>Enclosures of Documents</th>
					<th>Particular</th>
					<th> &nbsp; Amount &nbsp;  </th>
					<th>Ps.</th>
				</tr> 
			</thead>
			
			<tbody>
				<tr>
					<td rowspan="4" style="vertical-align: text-top;height:10px;"><?php reterve_intable_data_encloser_doc(); ?></td>
					<td style="height:10px;"> <center><strong>Custom</center></strong></td>
					
					<td style="border-bottom: 1px solid #fff;"></td>
					<td rowspan="13"></td>
				</tr>
				
				<tr>
					<td rowspan="" style="vertical-align: text-top;height:10px;">
						<?php reterve_intable_data_particular('2','customs'); ?>
					</td>
					<td style="border-bottom: 1px solid #fff;vertical-align: text-top;height:10px;" class="text-right" rowspan="2"> 
						
						<?php   
							$sql=$conn->query("SELECT * FROM  particular  WHERE port_id = '2' and particular_type = 'customs' ");
							
							while($getres=$sql->fetch_array()){
								$id = $getres[0] ;
								$sql2=$conn->query("SELECT * FROM  particular_d WHERE  particular_id= '$id' and bill_id='$bill_id' ");
								$getres2=$sql2->fetch_array();
								$amount = $getres2['amount'];
								$space = "-" ;
								if($amount == NULL OR $amount == 0){
									echo '<h6 style="padding:0px;margin:0px;font-size:14px;">'. $space .'</h6>';
								}
								else{
									echo '<h6 style="padding:0px;margin:0px;font-size:14px;">'.$amount.'</h6>';
								}
							}
							
						?>
						
					</td>
					
					
				</tr>
				
				<tr>
					
				</tr>
				
				<tr> 
					<td style="height:10px;"> <center><strong>Port & Jettys </strong></center> </td>
				</tr>
				<tr>
					<td><strong>Ex. S.S:</strong>  &nbsp;<?php echo reterve_job_comp($bill_id)['ex_ss']; ?></td>
					<td rowspan="6" style="vertical-align: text-top;height:10px;">
						<?php reterve_intable_data_particular('2','port_jetty'); ?>
					</td>
					<td style="border-color: #fff;" class="text-right" rowspan="6"> 
						
						<?php   
							$sql=$conn->query("SELECT * FROM  particular  WHERE port_id = '2' and particular_type = 'port_jetty' ");
							
							while($getres=$sql->fetch_array()){
								$id = $getres[0] ;
								$sql2=$conn->query("SELECT * FROM  particular_d WHERE  particular_id= '$id' and bill_id='$bill_id' ");
								$getres2=$sql2->fetch_array();
								$amount = $getres2['amount'];
								$space = "-" ;
								if($amount == NULL OR $amount == 0){
									echo '<h6 style="padding:0px;margin:0px;font-size:14px;">'. $space .'</h6>';
								}
								else{
									echo '<h6 style="padding:0px;margin:0px;font-size:14px;">'.$amount.'</h6>';
								}
							}
							
						?>
						
					</td>
				</tr>
				<tr>
					<td> <strong>Rot No.:</strong>  &nbsp;<?php echo reterve_job_comp($bill_id)['rot_no']; ?></td>
				</tr>
				<tr>
					<td><strong>Lin No.:</strong> &nbsp;<?php echo reterve_job_comp($bill_id)['lin_no']; ?></td>
				</tr>
				
				<tr>
					<td><strong>Arraived On.:</strong> &nbsp;<?php echo reterve_job_comp($bill_id)['arrived_on']; ?></td>
					
				</tr>
				
				<tr>
					<td><strong>Exporter:</strong> &nbsp;<?php echo reterve_job_comp($bill_id)['exporter']; ?></td>
					
					
				</tr>
				
				<tr>
					<td><strong>Depot:</strong> &nbsp;<?php echo reterve_job_comp($bill_id)['depot']; ?></td>
				</tr>
				
				<tr>
					<td><strong>C&F Value:</strong> &nbsp;<?php echo reterve_job_comp($bill_id)['cnf_value']; ?></td>
					<td style="height:10px;"> <center><strong>Others</strong></center> </td>
					<td style="border-color:#fff;">  </td>
				</tr>
				
				<tr>
					<td style="height:1px;"><strong>Date Of Clearance:</strong> &nbsp;<?php echo reterve_job_comp($bill_id)['clearence_date']; ?></td>
					<td rowspan="2" style="vertical-align: text-top;height:10px;">
						<?php reterve_intable_data_particular('2','others'); ?>
						<h6 style="padding:0px;margin:0px;font-size:14px;">Commission C&F on Assessable Value Tk. <?php echo reterve_intable_from_bill_view($bill_id)['accesable_value']; ?> @ <?php echo reterve_intable_from_bill_view($bill_id)['comission_acc']; ?>%</h6>
					</td>
					<td rowspan="2" style="vertical-align:text-top;height:10px;"class="text-right"><?php 
						$sql=$conn->query("SELECT * FROM  particular  WHERE port_id = '2' and particular_type = 'others' ");
						
						while($getres=$sql->fetch_array()){
							$id = $getres[0] ;
							$sql2=$conn->query("SELECT * FROM  particular_d WHERE  particular_id= '$id' and bill_id='$bill_id' ");
							$getres2=$sql2->fetch_array();
							$amount = $getres2['amount'];
							$space = "-" ;
							if($amount == NULL OR $amount == 0){
								echo '<h6 style="padding:0px;margin:0px;font-size:14px;">'. $space .'</h6>';
							}
							else{
								echo '<h6 style="padding:0px;margin:0px;font-size:14px;">'.$amount.'</h6>';
							}
						}
					?> 
					<h6 style="padding:0px;margin:0px;font-size:14px;"><?php echo reterve_intable_from_bill_view($bill_id)['net_comission_am']; ?></h6>
					</td>
				</tr>
				
				<tr>
					<td rowspan="6"><center><strong>Remarks: </strong> <br /><u>CTG</u><br /><?php echo reterve_job_comp($bill_id)['ac']; ?></center></td>
				</tr>
				
				<tr>
					
					<td style="border-bottom-color: #fff;" class="text-right">Total Tk.</td>
					<td class="text-center"><h6><?php echo reterve_intable_from_bill_view($bill_id)['total_bill']; ?></h6></td>
					<td></td>
				</tr>
				<tr>
					
					<td style="border-bottom-color: #fff;" class="text-right">Add Old/New Balance Tk.</td>
					<td class="text-center"></td>
					<td></td>
				</tr>
				<tr>
					
					<td style="border-bottom-color: #fff;" class="text-right">Grand Total</td>
					<td class="text-center"><h6><?php echo reterve_intable_from_bill_view($bill_id)['total_bill']; ?></h6></td>
					<td></td>
				</tr>
				<tr>
					
					<td style="border-bottom-color: #fff;" class="text-right">Less Advance Cash/Cheque/DD/TT on Date...</td>
					<td class="text-center"><h6><?php echo reterve_intable_from_bill_view($bill_id)['discount']; ?></h6></td>
					<td></td>
				</tr>
				<tr>
					
					<td style="" class="text-right">Net B/F Tk.</td>
					<td class="text-center"><h6><?php echo reterve_intable_from_bill_view($bill_id)['sub_total']; ?></h6></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		
		<h6>Total Tk.(In Words): <?php 
			$total_am=reterve_intable_from_bill_view($bill_id)['total_bill']; 
			echo numberTowords($total_am);
		?></h6>
		<br />
		<!--<div class="v_l" style="height:200px;width:2px;background-color:#000;"></div>-->
		<span style="margin-right: 10px;" class="float-right">Authorization Signature</span>
		<h4><strong>Tk.</strong> &nbsp;&nbsp;&nbsp;<span style="display: inline-block;
		padding: 7px 27px 12px 12px;" class="cardss" >=<?php echo $total_am; ?></span></h4>
		<br /> 
		<center><button style="padding:5px;border-radius:5px"  onclick="window.print()" id='printLink'>PRINT THIS BILL</button></center>
	</div>
	<?php
	}
?>
