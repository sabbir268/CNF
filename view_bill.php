<style type="text/css"> 
	.fixed-table-body {
    overflow-x: auto;
    overflow-y: auto;
    height: auto !important;
	}
	.search{
	float:left;
	}
</style>
<?php include('inc/easy_table.php'); ?>
<div class="content-wrapper">
    <div class="container-fluid">
		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">  
				<a href="#">Home</a>
			</li>
			<li class="breadcrumb-item active">View All Bills</li>
		</ol>
		<!-- Example DataTables Card-->
		<div class="card mb-3">
			<div class="card-header">
			<i class="fa fa-table"> &nbsp;</i>All Bill List</div>
			<div class="card-body">
				
					<table id="table" 
					data-toggle="table"
					data-search="true"
					data-filter-control="true" 
					data-show-export="false"
					data-click-to-select="false"
					data-show-header="true" 
					data-pagination="true"
					data-id-field="name"
					data-page-list="[5, 10, 25, 50, 100, ALL]"
					data-page-size="10"
					data-escape="false"
					>
						<thead>
							<tr>
								<!--<th data-field="state" data-checkbox="true"></th>-->
								<th data-field="sl_no" data-sortable="true">SL. No.</th>
								<th data-field="bill_no" data-filter-control="input" data-sortable="true">Bill No.</th>
								<th data-field="bill_date" data-filter-control="select" data-sortable="true">Bill Date</th>
								<th data-field="messers" data-filter-control="select" data-sortable="false">Messers</th>
								<th data-field="address" data-filter-control="input" data-sortable="false">Address</th>
								<th data-field="lc_no" data-filter-control="input" data-sortable="false">L/C No.</th>
								<th data-field="ac" data-filter-control="select" data-sortable="false">A/C</th>
								<th data-field="desc" data-filter-control="input" data-sortable="false">Goods Description</th>
								<th data-field="total_bill" data-filter-control="input" data-sortable="true">Total Bill</th>
								<th data-field="paid_am" data-filter-control="input" data-sortable="true">Paid Amount</th>
								<th data-field="due_am" data-filter-control="input" data-sortable="true">Due Amount</th>
								<th >View Bill</th>
							</tr>
						</thead>
						<tbody>
							
							<?php
								$sql=$conn->query("SELECT * FROM bill_view ");
								while($getrow=$sql->fetch_array()){
									echo '<tr>';
									// echo '<td class="bs-checkbox "><input data-index="'. $getrow['bill_id'] .'" name="btSelectItem" type="checkbox"></td>';
									echo '<td>'. $getrow['bill_id'] .'</td>';
									echo '<td>'. $getrow['bill_no'] .'</td>';
									echo '<td>'. $getrow['bill_date'] .'</td>';
									echo '<td>'. $getrow['messers'] .'</td>';
									echo '<td>'. $getrow['address'] .'</td>';
									echo '<td>'. $getrow['bill_lc'] .'</td>';
									echo '<td>'. $getrow['ac'] .'</td>';
									echo '<td>'. $getrow['desc'] .'</td>';
									echo '<td>'. $getrow['sub_total'] .'</td>';
									echo '<td>'. $getrow['paid_am'] .'</td>';
									echo '<td>'. $getrow['due'] .'</td>';
									echo '<td><a href="final'.$getrow['port_id'].'.php?bill_id='.$getrow['bill_id'] .'" class="btn btn-link">View Bill</a></td>';
									echo '</tr>';
								}
							?>
						</tbody>
					</table>
				
			</div>
		</div>
	</div>
	
