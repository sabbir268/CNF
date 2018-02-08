<div class="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="cnf.php">Home</a>
			</li>
			<li class="breadcrumb-item active">Add New Encclosures of Documents Fields</li>
		</ol>
		<div class="col-md-2 pull-left"></div>
		<form class="form-inline form-custom col-md-8" action="" method="POST" autocomplete="on">
			<center>
				<center><h2>Enter Enclosures Documents Field</h2></center>
				<hr />
				<div class="form-group">
					<label for="particuler">Enc. Doc. Field:</label>&nbsp;&nbsp;
					<input type="text" class="form-control" name="enc_doc" placeholder="Enclosures Documents Field" required />
				</div>
				<br />
				<div class="form-group">
					<label for="port">For Port:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<select class="form-control" name="port" id="" required> 
						<option value="">Select port:</option>
						<?php query_table('port'); ?>
					</select>
				</div>
				<br />
				<input  style="" type="submit" class="btn submit_btn" value="submit" name="enc_doc_add" />
				<?php insert_encloser_doc('enc_doc');
				?>
			</center>
		</form>
	</div> 		