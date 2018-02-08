<?php 
	include('../db/dbconfig.php');
	function query_table($table_name){
		global $conn;
		$sql=$conn->query("SELECT * FROM $table_name ");
		$count=$sql->field_count;
		
		while($getrow=$sql->fetch_array()){
			$i=0;
			while($i<=$count){
				 echo $getrow[$i].'<br />';
				$i++;
			}
		}
	}
	
	 query_table('particular');
	 echo $count;
?>