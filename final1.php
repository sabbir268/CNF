<?php 
	//include('header.php'); 
	include('inc/function.php');
	
	if ($_GET['bill_id'] ){
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
		table , td { 
		padding:5px !important;
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
					<td rowspan="6" style="vertical-align: text-top;height:10px;"><?php reterve_intable_data_encloser_doc(); ?>
					<br />
						 <strong>Track Recipt RR/SR No.:</strong><br />  <?php echo reterve_job_comp($bill_id)['track_recipt']; ?>
						 <br />
						 <br />
						 <strong>Description:</strong><br /> <?php echo reterve_job_comp($bill_id)['tr_description']; ?>
						 <br />
						 <br />
						 <strong>Exporter:</strong><br /> <?php// echo reterve_job_comp($bill_id)['exporter']; ?>
						  <strong>M/S.</strong><br /><?php echo reterve_job_comp($bill_id)['exporter']; ?>
						 <br />
						 <br />
						 <strong>C&F Value:</strong><br /><?php echo reterve_job_comp($bill_id)['cnf_value']; ?>
						 <br />
						 <br />
						 <strong>Date Of Clearance:</strong><br /><?php echo reterve_job_comp($bill_id)['clearence_date']; ?>
						 <br /> 
						 <br />
						 
						<h6 style="border-top:1px dotted;padding-top:20px;">
							<span><b>Port/Land Port: <br /> Benapole/Bhomra</b></span><br /><br />
							<center ><strong>Remarks: </strong> <br /><br /><?php echo reterve_job_comp($bill_id)['ac']; ?></center></h6>
						</td>
						
					<td rowspan="1" style="vertical-align: text-top;border-bottom: 1px solid #fff;">
						<?php reterve_intable_data_particular('1',null); ?>
							<h6 style="padding:0px;margin:0px;font-size:14px;">Clearing Commission A/Value Tk&nbsp;<?php echo reterve_intable_from_bill_view($bill_id)['accesable_value']; ?> @ <?php echo reterve_intable_from_bill_view($bill_id)['comission_acc']; ?>% ............................</h6>
					</td>
					<td class="text-right" rowspan="1" >
						<?php 
						$null=null;
						$sql=$conn->query("SELECT * FROM  particular  WHERE port_id = '1' and particular_type='$null' ");
						
						while($getres=$sql->fetch_array()){
							$id = $getres[0] ;
							$sql2=$conn->query("SELECT * FROM  particular_d WHERE  particular_id= '$id' and bill_id='$bill_id' ");
							$getres2=$sql2->fetch_array();
							$amount = $getres2['amount'];
							$space = "-" ;
							if($amount == NULL OR $amount == 0){
								echo '<center><h6 style="padding:0px;margin:0px;font-size:14px;">'. $space .'</h6></center>';
							}
							else{
								echo '<h6 style="padding:0px;margin:0px;font-size:14px;">'.$amount.'</h6>';
							}
						}
					?>
						<h6 style="padding:0px;margin:0px;font-size:14px;"><?php echo reterve_intable_from_bill_view($bill_id)['net_comission_am']; ?></h6>
						</td>
					<td rowspan=""></td>
				</tr>
				
				<tr>
					
					<td style="border-bottom-color: #fff;" class="text-right">Total Tk.</td>
					<td class="text-center"><h6><?php echo reterve_intable_from_bill_view($bill_id)['total_bill']; ?></h6></td>
					<td></td>
				</tr>
				<tr>
					
					<td style="border-bottom-color: #fff;" class="text-right">Add Old/New Balance Tk.</td>
					<td></td>
					<td></td>
					
				</tr>
				<tr>
					
					<td style="border-bottom-color: #fff;" class="text-right">Grand Total</td>
					<td class="text-center"><h6><?php echo reterve_intable_from_bill_view($bill_id)['sub_total']; ?></h6></td>
					<td></td>
					
				</tr>
				<tr>
					
					<td style="border-bottom-color: #fff;" class="text-right">Less Advance Cash/Cheque/DD/TT on Date...</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td style="" class="text-right">Net B/F Tk.</td>
					<td></td>
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
		<span style="margin-right: 130px;" class="float-right">Authorization Signature</span>
		<h4><strong>Tk.</strong> &nbsp;&nbsp;&nbsp;<span style="display: inline-block;
		padding: 7px 27px 12px 12px;" class="cardss" >=<?php echo $total_am; ?></span></h4>
		<br /> 
		<center><button style="padding:5px;border-radius:5px"  onclick="window.print()" id='printLink'>PRINT THIS BILL</button></center>
	</div>
	<?php
	}
?>
