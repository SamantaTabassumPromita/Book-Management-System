<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "boishomahar";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$user = $_POST['userId'];
$pass = $_POST['pass'];
$sql = "SELECT * FROM users WHERE user_ID = '$user' && pass ='$pass'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result,MYSQLI_NUM);
$num = mysqli_num_rows($result);

if($num==1){
	$id = $row[0];
	$name = $row[2];
	$email = $row[3];
	$mobile = $row[5];
	$folder = $row[13];
	$_SESSION['img']=$folder;
	$_SESSION['myid'] = $id;
	$_SESSION['name'] = $name;
	$_SESSION['email'] = $email;
	header('location:home.php');

}
else{
	die(header('location:signin.php?signin=error'));
}
$conn->close();

?>
