<?php 
	include('inc/function.php');
	include('header.php');
?>
<?php
	if(isset($_GET['page'])){
		$page=$_GET['page'].".php";
	}
	else{
		$page="home.php";
	}
	
	if(file_exists($page)){
		include $page;
	}
	else{
		include('example.php');
	}
	
?>
<?php 
	include('footer.php');
?>


