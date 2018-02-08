<!doctype html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>Easy Ajax Image Upload with jQuery and PHP - codingcage.com</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
	<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<div class="container">
	
	<hr>	
	<div id="preview"><img src="no-image.jpg" /></div>
    
	<form id="form" action="ajaxupload.php" method="post" enctype="multipart/form-data">
		<input id="uploadImage" type="file" accept="image/*" name="image" />
		<input id="button" type="submit" value="Upload">
	</form>
    <div id="err"></div>
	<hr>
	<p><a href="http://www.codingcage.com" target="_blank">www.codingcage.com</a></p>
</div>
</body>
</html>