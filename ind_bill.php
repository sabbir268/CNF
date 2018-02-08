<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style type="text/css"> 
	#show_data{
	border-right: 3px solid #ddd;
	}
	.modal-backdrop.show{
		display:none;
		}
	</style>
<div class="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="">Home</a>
			</li>
			<li class="breadcrumb-item active">Individual Bills And Payment</li>
		</ol>
		<div class="row">
			<div class="col-12">
				<form class="form-custom" action="">
					<div class="form-group">
						<select name="customer_name" class="form-control" id="customer_name"> 
							<option value="">Select a Customer...</option>
							<?php query_table('customer_option_view'); ?>
						</select>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7" id="show_data"></div>
			<div class="col-md-5" id="show_pay_data"></div>
		</div>
	</div> 	
</div>
	
	
	<script type="text/javascript"> 
		$(document).ready(function(){
			// code to get all records from table via select box
			$("#customer_name").change(function() {
				$("#show_pay_data").html(' ');
				$.ajax({
					type: "GET",
					url: 'extarnel_pages/ind_bill_data.php',
					dataType: "html",
					data: {customer_name:$(this).find(":selected").val()},
					cache: false,
					success: function(response) {
						$("#show_data").html(response);
					}
				});
			});
		});
	</script>		
	
	