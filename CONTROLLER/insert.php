<?php 
include("connection.php");
      error_reporting(0);
 ?>

<html>
<head>
	</head>
	<body>
		<form action="" method="post" enctype="multipart/form-data">
			ID<input type="text" name="id" value=""/><br><br>
			Upload Image <input type="file" name="uploadfile" value=""/><br><br>
			Name<input type="text" name="name" value=""/><br><br>
			class<input type="text" name="class" value=""/><br><br>
			<input type="submit" name="submit" value="Submit"/>
	

		</form>

		<?php 

		$id = $_POST['id'];
   		$name = $_POST['name'];
   		$class = $_POST['class'];

   		$filename = $_FILES["uploadfile"]["name"];
		$Tempname = $_FILES["uploadfile"]["tmp_name"];
		$folder = "images/".$filename;
         move_uploaded_file($Tempname,$folder);

		if($id!="" && $name!="" && $class!="" && $filename!="" )
		{

		$query = "INSERT INTO information VALUES ('$id','$folder','$name','$class' )" ;
		$data = mysqli_query($conn, $query);
		
		if($data){
			echo "Data Inserted Successfully";
		}
	}
		else
		{
			echo "All fields are required" ;
		}
   	




		 ?>
	</body>


</html>