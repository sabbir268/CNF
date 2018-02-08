<div class="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="cnf.php">Home</a>
			</li>
			<li class="breadcrumb-item active">Universal CNF </li>
		</ol>
  		<div id="demo">
			<div class="step-app">
				<ul class="step-steps">
					<li><a href="#step1">Customer Info</a></li>
					<li><a href="#step2">Job Info</a></li>
					<li><a href="#step3">Bill Info</a></li>
					<li><a href="#step4">Particular</a></li>
					<li><a href="#step5">Enclosur</a></li>
				</ul>
				<div class="step-content">
					<!-- first Step  start-->
					<div style="overflow:hidden;" class="step-tab-panel" id="step1">
						<div class="container">
							<div class="row">
								<div class="col-md-12"> 
									<div id="new" class="col-md-6 offset-md-3"> 
										<button style="width:100%" class="btn btn-default">
											Register a New customer
										</button>
									</div>
									
									<div style="clear:both"></div>
									<!-- new customer start -->
									
									<div id="open_new">
										<div id="form-content">
											<form method="post"  class="col-md-8 offset-md-2 form-custom2 reg-form" autocomplete="on">
												<center><h1>
													New Customer Info
												</h1></center>
												<hr />
												<div class="form-group">
													<label for="messers">Messers :</label>
													<input type="text" class="form-control" id="messers" name="messers" placeholder="Enter Messers" onBlur="job_custom" required />
												</div>
												<div class="form-group">
													<label for="address">Address :</label>
													<input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required />
												</div>
												
												<div class="form-group">
													<label for="lc_no">LC Number:</label>
													<input type="number" class="form-control" id="lc_no" name="lc_no"  placeholder="Enter LC Number" required />
												</div>
												
												<div class="form-group">
													<label for="lc_date">LC Date:</label>
													<input type="date" class="form-control" id="lc_date" name="lc_date"  required />
												</div>
												
												<button style="width:100%;    margin-bottom: 20px;" class="btn btn-primary" name="insert-data" id="insert-data" onclick="insertData()">Add Customer</button>
												<div style="clear:both"></div>
											</form>
										</div>
										
									</div><!-- .new customer end -->
									
									<div style="clear:both"></div>
									<!-- existing customer star -->
									<div id="futt" style="margin-top:20px;margin-bottom:20px;" class="alert alert-warning">
										<center><strong>Existing Customer.</strong> Skip this page if customer is existed.</center>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- .first Step  end-->
					
					<!-- second Step  start-->
					<div class="step-tab-panel" id="step2">
						<div id="form-content2">
							<form style="padding-top:20px;padding-bottom:20px;margin-top:10px;" class="col-md-12 form-custom2"  method="post" id="reg-form2" autocomplete="on">
								
								<h1><center>Insert Job Info</center></h1>
								<hr /> 
								
								<div class="form-group">
									<label for="particuler">Select Customer: (<span style="color:red;font-size:12px;">Leave it blank for new customer.</span>) </label>
									<select class="form-control" name="customer_id" id="customer_id">
										<option value="">Select Customer:</option>
										<?php query_table('customer_option_view'); ?>
									</select>
								</div>
								
								<div class="form-group">
									<label for="port">For Port:</label>
									<select class="form-control" name="port" id="select_port" onchange="portOption()" required> 
										<option value="">Select port:</option>
										<?php query_table('port'); ?>
									</select>
								</div>
								
								<div class="col-md-6 pull-left">
									<div class="form-group">
										<label for="job_no">Job No:</label>&nbsp;&nbsp;
										<input type="text" class="form-control" name="job_no" placeholder="Enter Job No" required />
									</div>
									
									<div class="form-group">
										<label for="ac">A/c :</label>&nbsp;&nbsp;
										<input type="text" class="form-control" name="ac" placeholder="Enter A/c Info" required />
									</div>
									
									<div class="form-group">
										<label for="bill_of_entry">Bill Of Entery No. :</label>&nbsp;&nbsp;
										<input type="text" class="form-control" name="bill_of_entry" placeholder="Enter Bill Of Entery No." required />
									</div>
									
									<div class="form-group">
										<label for="bill_date">Date Of Bill:</label>&nbsp;&nbsp;
										<input type="date" class="form-control" name="bill_date"  required />
									</div>
									
									<div class="form-group">
										<label for="desc_good">Description Of Goods :</label>&nbsp;&nbsp;
										<input type="text" class="form-control" name="desc_good" placeholder="Enter Description Of Goods" required />
									</div>
									
									<div class="form-group">
										<label for="qty">Quantity :</label>&nbsp;&nbsp;
										<input type="text" class="form-control" name="qty" placeholder="Enter Quantity" required />
									</div>
									
									<div class="form-group">
										<label for="weight">Weight :</label>&nbsp;&nbsp;
										<input type="text" class="form-control" name="weight" placeholder="Enter Weight" required />
									</div>
									<div id="exp">
									<div class="form-group">
										<label for="ex_ss">Ex. S.S :</label>&nbsp;&nbsp;
										<input type="text" class="form-control" name="ex_ss" placeholder="Ex. S.S "  />
									</div>
									
									<div class="form-group">
										<label for="rot_no">Rot No. :</label>
										<input type="text" class="form-control" name="rot_no" placeholder="Enter Rot No "  />
									</div>
									</div>
								</div>
								
								<div class="col-md-6 pull-right">
									
									<div id="exp2">
									<div class="form-group">
										<label for="lin_no">Lin No.:</label>&nbsp;&nbsp;
										<input type="text" class="form-control" name="lin_no" placeholder="Enter Lin No."  />
									</div>
									
									<div class="form-group">
										<label for="arrived_on">Arrived On:</label>&nbsp;&nbsp;
										<input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="arrived_on" placeholder=""  />
									</div>
									</div>
									<div  id="exceptional">
										<div class="form-group">
											<label for="track_recipt">Track Recipt RR/SR No. :</label>&nbsp;
											<input type="text" class="form-control" name="track_recipt" id="track_recipt" placeholder="Enter Track Recipt RR/SR No." value="" />
										</div>
										
										<div class="form-group">
											<label for="tr_description">Track Recipt Description:</label>&nbsp;&nbsp;
											<input type="text" class="form-control" name="tr_description" id="tr_description" placeholder="Enter Track Recipt Description" value=""  />
										</div>
									</div>
									<div class="form-group">
										<label for="exporter">Exporter:</label>&nbsp;&nbsp;
										<input type="text" class="form-control" name="exporter" placeholder="Enter exporter" required />
									</div>
									
									<div id="exp3" class="form-group">
										<label for="depot">Depot:</label>&nbsp;&nbsp;
									<input type="text" class="form-control" name="depot" placeholder="Enter depot"  />
									</div>
									
									<div class="form-group">
										<label for="cnf_value">CNF Value:</label>&nbsp;&nbsp;
										<input type="text" class="form-control" name="cnf_value" placeholder="Enter CNF Value" required />
									</div>
									
									<div class="form-group">
										<label for="particuler">Clearence Date :</label>&nbsp;&nbsp;
										<input type="date" class="form-control" name="clearence_date" placeholder="Enter Clearence Date " required />
									</div>
									
								</div>
								<input  style="" type="submit" class="btn submit_btn" value="Submit" name="port_add" />
								
							</form>
						</div>
					</div><!-- .second Step  end-->
					
					<!-- Tirhd Step  start-->
					<div class="step-tab-panel" id="step3">
						<div id="show_succ">
							<form style="padding-top:10px;padding-bottom:10px;margin-top:10px;" class="col-md-8 offset-md-2 form-custom2" method="POST" id="bill_form" > 
								<center><h1>Bill Info</h1></center>
								
								<hr />
								
								<div class="form-group">
									<label for="bill_number">Bill Number :</label>
									<input type="text" class="form-control" name="bill_number" placeholder="Enter Bill Number " required />
								</div>
								
								<div class="form-group">
									<label for="bill_date">Bill Date:</label>
									<input type="date" class="form-control" name="bill_date"  required />
								</div>
								<input  style="" type="submit" class="btn submit_btn" value="Submit" name="bill_add" />
							</form>
						</div>
					</div><!-- .Tirhd Step  start-->
					
					<!-- Fourth Step  start-->
					<div class="step-tab-panel" id="step4">
						<div style="padding-top:10px;padding-bottom:10px;margin-top:10px;" class="col-md-12 form-custom2"  >
							<div  id="msg_prt" class="msg_prt"></div>
							<h1><center>Insert Particular Info</center></h1>
							<div class="row">
							<button style="margin-right:5px;" class="btn btn-secondary col-md-5 offset-md-1" id="bv">Benapole/Vomra</button>
							
							<button class="btn btn-secondary col-md-5 " id="ctg">Chittagong</button>
							</div>
							<hr /> 
							
							<table id="bvp" style="display:none" class="table table-bordered text-center">
								<?php  reterve_data_particular_bv() ?>
								<tr style="background-color: #fff;border-left: 2px solid #fff;border-right: 2px solid #ffff;"> 
									<td colspan="4"> 
									</td>
								</tr>
								<tr>  
									<form class="com_add_form" method="POST">
										<td>
											Commission C&F on assessable Value Tk
										</td>
										<td > 
											<input type="number"  id="com_val" class="form-control" name="assessable_value" placeholder="Enter Commission C&F on assessable Value Tk " required  />
										</td>
										
										<td> 
											<input style="width:50%;" type="number" id="com_per" class="form-control pull-left" name="comission_ass"  placeholder="Enter comission parcentage"  pattern="[0-9]+([\.,][0-9]+)?" step="0.01" onkeydown="com_func()" onkeyup="com_func()"  required /> 
											<span style="margin-top: 3px;margin-left: 7px;font-size:21px;" class="pull-left">%</span>
										</td>
										
										<td> 
											<input type="submit" class="btn btn-info btn-sm part_ind_add" value="ADD">	
										</td>
										
									</form>
								</tr>
								<tr style="border-color:#000">  
									<td>Total C&F Commission Amount</td>
									<td colspan="3"><span id="total_comission"> 0 </span>  </td>
								</tr>
								
								<tr style="border-color:#000">  
									<td><strong>Total  Amount</strong></td>
									<td colspan="3"><strong><span class="total_am"> 0 </span></strong></td>
								</tr>
								
								<tr>  
									<form class="disc_form" method="POST">
										<td>
											Discount Amount
										</td>
										<td> 
											<input  type="number" id="disc_am" class="form-control pull-left" name="disc_am"  placeholder="Enter comission parcentage"  pattern="[0-9]+([\.,][0-9]+)?" step="0.01"  required /> 
										</td>
										
										<td colspan="2"> 
											<input type="submit" class="btn btn-info btn-sm part_ind_add" value="ADD">	
										</td>
										
									</form>
								</tr>
							</table>
							
							<table id="ctgp" style="display:none" class="table table-bordered text-center">
								<?php  reterve_data_particular_ctg() ?>
								<tr style="background-color: #fff;border-left: 2px solid #fff;border-right: 2px solid #ffff;"> 
									<td colspan="4"> 
									</td>
								</tr>
								<tr>  
									<form class="com_add_form" method="POST">
										<td>
											Commission C&F on assessable Value Tk
										</td>
										<td > 
											<input type="number"  id="com_val2" class="form-control" name="assessable_value" placeholder="Enter Commission C&F on assessable Value Tk " required  />
										</td>
										
										<td> 
											<input style="width:50%;" type="number" id="com_per2" class="form-control pull-left" name="comission_ass"  placeholder="Enter comission parcentage"  pattern="[0-9]+([\.,][0-9]+)?" step="0.01" onkeydown="com_func2()" onkeyup="com_func2()"  required /> 
											<span style="margin-top: 3px;margin-left: 7px;font-size:21px;" class="pull-left">%</span>
										</td>
										
										<td> 
											<input type="submit" class="btn btn-info btn-sm part_ind_add" value="ADD">	
										</td>
										
									</form>
								</tr>
								<tr style="border-color:#000">  
									<td>Total C&F Commission Amount</td>
									<td colspan="3"><span id="total_comission2"> 0 </span>  </td>
								</tr>
								
								<tr style="border-color:#000">  
									<td><strong>Total  Amount</strong></td>
									<td colspan="3"><strong><span class="total_am"> 0 </span></strong></td>
								</tr>
								
								<tr>  
									<form class="disc_form" method="POST">
										<td>
											Discount Amount
										</td>
										<td> 
											<input  type="number" id="disc_am" class="form-control pull-left" name="disc_am"  placeholder="Enter comission parcentage"  pattern="[0-9]+([\.,][0-9]+)?" step="0.01"  required /> 
										</td>
										
										<td colspan="2"> 
											<input type="submit" class="btn btn-info btn-sm part_ind_add" value="ADD">	
										</td>
										
									</form>
								</tr>
							</table>
							
							<table id="allp" class="table table-bordered text-center">
								<?php  reterve_data_particular() ?>
								<tr style="background-color: #fff;border-left: 2px solid #fff;border-right: 2px solid #ffff;"> 
									<td colspan="4"> 
									</td>
								</tr>
							
							<tr>  
									<form class="com_add_form" method="POST">
										<td>
											Commission C&F on assessable Value Tk
										</td>
										<td > 
											<input type="number"  id="com_val2" class="form-control" name="assessable_value" placeholder="Enter Commission C&F on assessable Value Tk " required  />
										</td>
										
										<td> 
											<input style="width:50%;" type="number" id="com_per2" class="form-control pull-left" name="comission_ass"  placeholder="Enter comission parcentage"  pattern="[0-9]+([\.,][0-9]+)?" step="0.01" onkeydown="com_func2()" onkeyup="com_func2()"  required /> 
											<span style="margin-top: 3px;margin-left: 7px;font-size:21px;" class="pull-left">%</span>
										</td>
										
										<td> 
											<input type="submit" class="btn btn-info btn-sm part_ind_add" value="ADD">	
										</td>
										
									</form>
								</tr>
								<tr style="border-color:#000">  
									<td>Total C&F Commission Amount</td>
									<td colspan="3"><span id="total_comission2"> 0 </span>  </td>
								</tr>
								
								<tr style="border-color:#000">  
									<td><strong>Total  Amount</strong></td>
									<td colspan="3"><strong><span class="total_am"> 0 </span></strong></td>
								</tr>
								
								<tr>  
									<form class="disc_form" method="POST">
										<td>
											Discount Amount
										</td>
										<td> 
											<input  type="number" id="disc_am" class="form-control pull-left" name="disc_am"  placeholder="Enter comission parcentage"  pattern="[0-9]+([\.,][0-9]+)?" step="0.01"  required /> 
										</td>
										
										<td colspan="2"> 
											<input type="submit" class="btn btn-info btn-sm part_ind_add" value="ADD">	
										</td>
										
									</form>
								</tr>
							</table>
							
							<div class="card"> 
								<div class="card-block">
									<div class="container ">
										<div style="margin: 10px 0px;" class="row">
											<div class="col-md-6 text-center"><h3><strong>Sub Total</strong></h3></div>
											<div style="padding-top:4px;" class="col-md-6 text-center"><h4><span id="sub_total_am"></span></h4></div>
										</div>
									</div>
								</div>
							</div>
							<!--<table style="margin-top:10px;" class="table table-bordered text-center"> 
								<tr>  
									<form id="paid_form" method="POST">
										<td>
											Paid Amount
										</td>
										<td> 
											<input  type="number" id="paid_am" class="form-control text-center pull-left" name="paid_am"  placeholder="Enter Paid Amount"  pattern="[0-9]+([\.,][0-9]+)?" step="0.01" value="0"   required /> 
										</td>
										
										<td colspan="2"> 
											<input type="submit" class="btn btn-info btn-sm part_ind_add" value="ADD">	
										</td>
										
									</form>
								</tr>
							</table>-->
							
						</div>
					</div><!-- .Fourth Step  start-->
					
					<!-- Fifth Step  start-->
					<div class="step-tab-panel" id="step5">
						<div style="padding-top:10px;padding-bottom:10px;margin-top:10px;" class="col-md-12 form-custom2"  >
							<div  id="msg_prt2" class="msg_prt"></div>
							<h1><center>Insert Enclosur Document Info</center></h1>
							<hr /> 
							<table class="table table-bordered text-center">
								<?php reterve_data_encloser_doc(); ?>
							</table>
						</div>
					</div><!-- .Fifth Step  start-->
					
				</div>
				
			</div>
			<div class="step-footer pull-right">
				<button data-direction="prev" class="btn btn-info"><i class="fa fa-angle-double-left btn-lg" aria-hidden="true"></i></button>
				<button data-direction="next" class="btn btn-info btn-lg" id="nexts"><i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
				<button data-direction="finish" class="btn btn-success btn-lg">FINISH</button>
			</div>
		</div>
	</div>
</div>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="js/jquery-steps.js"></script>
<script>
	$('#demo').steps({
		onFinish: function () {
			window.location.href='cnf.php?page=finish';
		}
	});
</script>

<script> 
	$(document).ready(function(){
		$("#new").click(function(){
			$("#open_new").toggle("slow");
			$("#futt").toggle("slow");
		});
		
		$("#bv").click(function(){
			$("#bvp").toggle("slow");
			$("#allp").toggle("slow");
			$("#ctgp").hide("slow");
		});
		
		$("#ctg").click(function(){
			$("#ctgp").toggle("slow");
			$("#allp").toggle("slow");
			$("#bvp").hide("slow");
		});
		
	});
</script>
<script
src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {	
		
		// submit form using $.ajax() method
		
		$('.reg-form').submit(function(e){
			
			e.preventDefault(); // Prevent Default Submission
			
			$.ajax({
				url: 'extarnel_pages/submit_customer.php',
				type: 'POST',
				data: $(this).serialize() // it will serialize the form data
			})
			.done(function(data){
				$('#form-content').fadeOut('slow', function(){
					$('#form-content').fadeIn('slow').html(data);
				});
			})
			.fail(function(){
				alert('Ajax Submit Failed ...');	
			});
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {	
		
		// submit form using $.ajax() method
		
		$('#reg-form2').submit(function(e){
			
			e.preventDefault(); // Prevent Default Submission
			
			$.ajax({
				url: 'extarnel_pages/submit_job.php',
				type: 'POST',
				data: $(this).serialize() // it will serialize the form data
			})
			.done(function(data){
				$('#form-content2').fadeOut('slow', function(){
					$('#form-content2').fadeIn('slow').html(data);
				});
			})
			.fail(function(){
				alert('Ajax Submit Failed ...');	
			});
		});
	});
</script>

<script>
	$(document).ready(function(){
		$("span.add").hide();
		$("center.addit").click(function(){
			$("span.add").hide(); //hide all ul.menu
			$(this).prev().show("fast"); 
		});
	});
</script>


<script type="text/javascript">
	$(document).ready(function() {	
		
		// submit form using $.ajax() method
		
		$('.parti_ind').submit(function(e){
			
			e.preventDefault(); // Prevent Default Submission
			
			$.ajax({
				url: 'extarnel_pages/particuler_form.php',
				type: 'POST',
				data: $(this).serialize() // it will serialize the form data
			})
			.done(function(data){
				$('#msg_prt').fadeIn('slow').html(data);
				//$('#myModal').modal({ show: false});
				//alert('success to add amount on particuler field');	
			})
			.fail(function(){
				alert('Ajax Submit Failed ...');	
			});
		});
	});
</script>


<script type="text/javascript">
	$(document).ready(function() {	
		
		// submit form using $.ajax() method
		
		$('#bill_form').submit(function(e){
			
			e.preventDefault(); // Prevent Default Submission
			
			$.ajax({
				url: 'extarnel_pages/submit_bill.php',
				type: 'POST',
				data: $(this).serialize() // it will serialize the form data
			})
			.done(function(data){
				$('#show_succ').fadeOut('slow', function(){
					$('#show_succ').fadeIn('slow').html(data);
				});
			})
			.fail(function(){
				alert('Ajax Submit Failed ...');	
			});
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {	
		
		// submit form using $.ajax() method
		
		$('.com_add_form').submit(function(e){
			
			e.preventDefault(); // Prevent Default Submission
			
			$.ajax({
				url: 'extarnel_pages/com_add_form.php',
				type: 'POST',
				data: $(this).serialize() // it will serialize the form data
			})
			.done(function(data){
				$('#msg_prt').fadeIn('slow').html(data);
			})
			.fail(function(){
				alert('Ajax Submit Failed ...');	
			});
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {	
		
		// submit form using $.ajax() method
		
		$('.disc_form').submit(function(e){
			
			e.preventDefault(); // Prevent Default Submission
			
			$.ajax({
				url: 'extarnel_pages/disc_form.php',
				type: 'POST',
				data: $(this).serialize() // it will serialize the form data
			})
			.done(function(data){
				$('#msg_prt').fadeIn('slow').html(data);
			})
			.fail(function(){
				alert('Ajax Submit Failed ...');	
			});
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {	
		
		$('#paid_form').submit(function(e){
			
			e.preventDefault(); // Prevent Default Submission
			
			$.ajax({
				url: 'extarnel_pages/paid_form.php',
				type: 'POST',
				data: $(this).serialize() // it will serialize the form data
			})
			.done(function(data){
				$('#msg_prt').fadeIn('slow').html(data);
			})
			.fail(function(){
				alert('Ajax Submit Failed ...');	
			});
		});
	});
</script>



<script type="text/javascript">
	$(document).ready(function() {
		setInterval(function(){
			$.ajax({    //create an ajax request to display.php
				type: "GET",
				url: "extarnel_pages/sub_total_am.php",             
				dataType: "html",   //expect html to be returned                
				success: function(response){                    
					$("#sub_total_am").html(response); 
					
				}
			});
			
			$.ajax({    //create an ajax request to display.php
				type: "GET",
				url: "extarnel_pages/total_am.php",             
				dataType: "html",   //expect html to be returned                
				success: function(response){                    
					$(".total_am").html(response); 
					
				}
			});
		}, 500);
	});
</script>



<script type="text/javascript"> 
	$(document).ready(function (e) {
		$(".form_enc").on('submit',(function(e) {
			e.preventDefault();
			$.ajax({
				url: "extarnel_pages/submit_enc_doc.php",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				beforeSend : function()
				{
					//$("#preview").fadeOut();
					$("#err").fadeOut();
				},
				success: function(data)
				{
					if(data=='invalid')
					{
						// invalid file format.
						$("#err").html("Invalid File !").fadeIn();
					}
					else
					{
						$("#msg_prt2").html(data).fadeIn();
					}
				},
				error: function(e) 
				{
					$("#err").html(e).fadeIn();
				} 	        
			});
		}));
	});
	
</script>

<script type="text/javascript"> 
	function com_func(){
		var x = document.getElementById("com_val").value;
		var y = document.getElementById("com_per").value;
		var z = (x * y)/100 ;
		document.getElementById("total_comission").innerHTML = (Number(z).toFixed(2)) ;
	}
	
	function com_func2(){
		var x = document.getElementById("com_val2").value;
		var y = document.getElementById("com_per2").value;
		var z = (x * y)/100 ;
		document.getElementById("total_comission2").innerHTML = (Number(z).toFixed(2));
		
	}
	
	function portOption(){
		var x = document.getElementById("select_port").value;
		//consol.log(x);
		//window.alert(x);
		if ( x == 2){
			document.getElementById("exceptional").style.opacity= "0";
			document.getElementById("exp").style.opacity= "1";
			document.getElementById("exp2").style.opacity= "1";
			document.getElementById("exp3").style.opacity= "1";
		}
		else{ 
			document.getElementById("exceptional").style.opacity= "1";
			document.getElementById("exp").style.opacity= "0";
			document.getElementById("exp2").style.opacity= "0";
			document.getElementById("exp3").style.opacity= "0";
		}
	}
</script>



