<style type="text/css"> 
	#exceptional{
	display:none;
	}
</style>
<div class="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="cnf.php">Home</a>
			</li>
			<li class="breadcrumb-item active">Add New Particular</li>
		</ol>
		<div class="col-md-2 pull-left"></div>
		<form class="form-inline form-custom col-md-8" action="" method="POST" autocomplete="on">
			<center>
				<center><h2>Enter Particuler Field</h2></center>
				<hr />
				<div class="form-group">
					<label for="particuler">Particular Field:</label>&nbsp;&nbsp;
					<input type="text" class="form-control" name="particuler" placeholder="Enter a particuler field" required />
				</div>
				<br />
				<div class="form-group">
					<label for="port">For Port:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<select class="form-control" name="port" id="select_port" onchange="portOption()" required> 
						<option value="">Select port:</option>
						<?php query_table('port'); ?>
					</select>
				</div>
				<br />
				<div class="form-group" id="exceptional">
					<label for="particular_type">Type:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<select class="form-control" name="particular_type" id=""> 
						<option value="">Select Type: </option>
						<option value="customs">Customs</option>
						<option value="port_jetty"> Port&jetty &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
						<option value="Others">Others</option>
					</select>
				</div>
				<br />
				<input  style="" type="submit" class="btn submit_btn" value="submit" name="particuler_add" />
				<?php insert_particuler('particular');
				?>
			</center>
		</form>
	</div> 		
	
	<script type="text/javascript"> 
		function portOption(){
		var x = document.getElementById("select_port").value;
		//consol.log(x);
		
		if ( x == 2){
		 document.getElementById("exceptional").style.display= "block";
		//$("exceptional").show();
		}
		else{
		//$("exceptional").hide();
		document.getElementById("exceptional").style.display= "none";
		}
		}	
		
	</script>			