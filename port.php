<div class="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="cnf.php">Home</a>
			</li>
			<li class="breadcrumb-item active">Add New Port</li>
		</ol>
		<div class="col-md-2 pull-left"></div>
		<form class="form-inline form-custom col-md-8" action=" " method="POST" autocomplete="on">
		<center>
			<center><h2>Enter Port</h2></center>
			<hr />
			<div class="form-group">
				<label for="particuler">New Port:</label>&nbsp;&nbsp;
				<input type="text" class="form-control" name="port" placeholder="Enter a particuler field" required />
			</div>
			<br />
			<input  style="" type="submit" class="btn submit_btn" value="submit" name="port_add" />
			</center>
		</form>
	</div> 		
	<?php insert_port('port');?>