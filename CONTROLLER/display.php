<style type="text/css">
	
	td{
		padding: 15px;
	}
</style>



<?php 
include("connection.php");
error_reporting(0);

$query = "SELECT* FROM INFORMATION " ;
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);




if($total != 0){

	?>

	<table>
		<tr>
			<th>ID</th>
			<th>Image</th>
			<th>Name</th>
			<th>Department</th>
			<th colspan="2">Operations</th>
		</tr>
			

	<?php

	while($result = mysqli_fetch_assoc($data)){

	echo "<tr>
			<td>".$result['id']."</td>
			<td><a href='$result[picture]'><img src='".$result['picture']."' height='100' width='100'/></a></td>
			<td>".$result['name']."</td>
			<td>".$result['class']."</td>
			<td><a href='update.php?id=$result[id]&name=$result[name]&class=$result[class]'>Edit</a></td>
			<td>Delete</td>
		</tr>";
		
	}
}
else
{
	 echo "No record";
}


 ?>
</table>