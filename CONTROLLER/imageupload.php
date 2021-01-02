<?php 
error_reporting(0);
 ?>

 <html>
 <body>
 
 		<form action="" method="post" enctype="multipart/form-data">
 			<input type="file" name="uploadfile" value=""/>
 			<input type="submit" name="submit" value="Upload file"/>
 		</form>
 </body>
 </html>
 <?php 
$filename = $_FILES["uploadfile"]["name"];
$Tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "images/".$filename;
move_uploaded_file($Tempname,$folder);
echo "<img src='$folder' height='100' width='100'/>";
  ?>
 