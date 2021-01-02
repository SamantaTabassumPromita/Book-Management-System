<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "boishomahar";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$filename = $_FILES["uploadfile"]["name"];
$Tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "images/".$filename;
move_uploaded_file($Tempname,$folder);

$sql = "INSERT INTO users VALUES('$_POST[userId]','$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[pass]','$_POST[gender]','$_POST[mob]','$_POST[dept]','$_POST[street]','$_POST[city]','$_POST[postcode]','$folder')";

if ($conn->query($sql) === TRUE) {
   header('location:signin.php');
} 
else {
  header('location:registration.php?id=error');
 // echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
