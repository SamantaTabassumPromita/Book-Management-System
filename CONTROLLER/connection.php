<?php  

$servername = "localhost" ;
$username = "root" ;
$password = "";
$dbname = "practiceimage";




$conn = mysqli_connect($servername,$username,$password,$dbname);

if ($conn) {
	
	echo "" ;
}
else{
	die("Failed coz".mysql_connect_error()) ;
}


?>	