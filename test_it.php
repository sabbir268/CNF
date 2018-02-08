<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
<?php include('db/dbconfig.php'); ?>
<style type="text/css"> 
	.fixed-table-body {
    overflow-x: auto;
    overflow-y: auto;
    height: auto !important;
	}
</style>
<?php include('inc/easy_table.php'); ?>
<!--<div id="toolbar">
	<select class="form-control">
	<option value="">Export Basic</option>
	<option value="all">Export All</option>
	<option value="selected">Export Selected</option>
	</select>
</div>-->
</head>
<body>
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
data-page-size="5"
data-escape="false"
>
	<thead>
		<tr>
			<th data-field="state" data-checkbox="true"></th>
			<th data-field="sl_no" data-sortable="true">SL. No.</th>
			<th data-field="bill_no" data-filter-control="input" data-sortable="true">Bill No.</th>
			<th data-field="bill_date" data-filter-control="select" data-sortable="true">Bill Date</th>
			<th data-field="messers" data-filter-control="select" data-sortable="true">Messers</th>
			<th data-field="address" data-filter-control="input" data-sortable="true">Address</th>
			<th data-field="lc_no" data-filter-control="input" data-sortable="true">L/C No.</th>
			<th data-field="desc" data-filter-control="input" data-sortable="true">Goods Description</th>
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
				echo '<td class="bs-checkbox "><input data-index="'. $getrow['bill_id'] .'" name="btSelectItem" type="checkbox"></td>';
				echo '<td>'. $getrow['bill_id'] .'</td>';
				echo '<td>'. $getrow['bill_no'] .'</td>';
				echo '<td>'. $getrow['bill_date'] .'</td>';
				echo '<td>'. $getrow['messers'] .'</td>';
				echo '<td>'. $getrow['address'] .'</td>';
				echo '<td>'. $getrow['bill_lc'] .'</td>';
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


</body>
</html>

