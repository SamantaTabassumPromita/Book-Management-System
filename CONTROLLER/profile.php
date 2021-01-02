<?php  
session_start();
?>
<?php 
if (isset($_POST['out'])) {
session_unset();
header("Location: signin.php");
}
 ?>
<?php 

if (isset($_POST['search'])) {
 $srch = $_POST['query'];
 echo $srch;
 header("location:sbooklist.php?search=".urlencode($srch)."");
}
if (isset($_POST['edit'])) {
	$id=$_SESSION['myid'];
	header("location:registrationedit.php?update=".urlencode($id)."");
}

 ?>
<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
	<title>Boi Shomahar</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
	<div class="fixed-action-btn smooth-scroll" style="bottom: 45px; right: 24px;">
  <a href="#top-section" class="btn-floating btn-large primary-color">
    <i class="fas fa-arrow-up"></i>
  </a>
</div>
	 <div class="head" id="top-section">

	 	<div class="row m-4">
	 		<div class="col-md-3">
	 			<img src="img/logo.png" style="width: 10rem;" align="center">
	 		</div>
	 		<div class="col-md-6">
	 			<!-- Search form -->
	 			<form class="form-inline md-form mr-auto mb-4" action="" method="post">
				<input class="form-control mr-sm-2" type="text" name="query" style="width: 70%;" placeholder="search" aria-label="search">
  				<button class="btn btn-primary  btn-sm my-0" name="search" type="submit">Search</button>
  				</form>
	 		</div>
	 		<div class="col-md-2 mb-5 ml-5">
	 			<form class="md-form" action="" method="post">
	 			<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
    			aria-haspopup="true" aria-expanded="false">Welcome, <?php echo $_SESSION['name']; ?></button>
  					<div class="dropdown-menu dropdown-primary">
    				<a class="dropdown-item" href="profile.php?id=<?php echo $_SESSION['myid'] ?>">Profile</a>
    				<button class="btn btn btn-primary" name="out" type="submit">Log out</button>
 					</div>
 				</form>
			</div>
		</div>
	</div>
</div>
	<!--Navbar starts-->
		<nav class="navbar  sticky-top navbar-expand-lg navbar-dark primary-color">

		  <!-- Navbar brand -->
		  <a class="navbar-brand" href="home.php">Boi-Shomahar</a>

		  <!-- Collapse button -->
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
		    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <!-- Collapsible content -->
		  <div class="collapse navbar-collapse" id="basicExampleNav">

		    <!-- Links -->
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="home.php">Home
		          <span class="sr-only">(current)</span>
		        </a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="booklist.php">Library</a>
		      </li>
		       <li class="nav-item">
		        <a class="nav-link" href="#">Wishlist</a>
		      </li>
		       <li class="nav-item">
		        <a class="nav-link" href="#">Contact</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">About Us</a>
		      </li>
		    </ul>
		  </div>
		</nav>
		<!--/.Navbar-->
<!-------------Start your code here--------------->
<?php 

?>



<html>
<head>
 <title>User Profile</title>

 

 <body>
<div class="container-fluid">
	<div class="row p-3">
 	<div class="col-md-4">
 	<div class="sticky-top" style="padding-top: 70px;">
 	<div class="m-6 p-4 card">
 		<div class="card-body " align="center" >
 			
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
				$pid=$_SESSION['myid'];
				$sql = "SELECT * FROM users WHERE user_ID = '$pid'";
				$result = mysqli_query($conn, $sql);
				$num = mysqli_num_rows($result);
				while ($row = mysqli_fetch_assoc($result)) {
					echo "
					<img class='d-flex align-center-start rounded-circle mb-5 z-depth-2 ' style='width:200px; height:200px;' src='".$row['image']."'>
					<h1>{$row['F_name']} {$row['L_name']}</h1>
 					<h3>{$row['user_ID']}</h3>
 					<a href='#'>{$row['email']}</a><br>
 					<p style='font-weight:bold;display:inline;'>Department: </p> <p style='display:inline;'>{$row['dept']}</p>
					";
				} 

 			?>
		 
			<form class="md-form" action="" method="post">
				<button class="btn btn-warning" name="edit" type="sumbit">Edit profile</button>
			</form>
 		</div>
 		</div>
 	</div>
 	</div>	
 	<div class="col-md-8">
 			<div class="card mt-3">
 				<h4 class="p-3"> My sale posts:</h4>
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
				$pid=$_SESSION['myid'];
				$sql= "SELECT * FROM ((users INNER JOIN book ON users.user_ID=book.std_id) INNER JOIN sell ON sell.ISBN = book.ISBN AND sell.std_id1=book.std_id) WHERE user_ID ='$pid'";
 				$sql2 ="SELECT * FROM (((users INNER JOIN book ON users.user_ID=book.std_id) INNER JOIN offered ON offered.ISBN = book.ISBN AND offered.std_id3=book.std_id) INNER JOIN exchange_with ON exchange_with.std_id5=offered.std_id3 AND exchange_with.exISBN=offered.exISBN) WHERE user_ID ='$pid'";

 				$result = mysqli_query($conn, $sql);
 				$result2 = mysqli_query($conn, $sql2);
 				$num = mysqli_num_rows($result);
 				$num2=mysqli_num_rows($result2);
 				while ($row = mysqli_fetch_assoc($result)) {
						# code...
					echo "<div class='card  m-3'>
					<div class='card-body'>
					<div class='row'>
					<div class='col-md-3'>
					<div class='view overlay zoom'>
					<a href='mysalebook.php?isbn=".urlencode($row['ISBN'])."&sid=".urlencode($row['std_id1'])."'><img class='d-flex align-left-start mr-3 z-depth-2' style='width:200px; height:250px;' src='".$row['Bimage']."'></a></div>
					</div>
					<div class='col-md-6'>
					<h4 style='display:inline;'> <a href='mysalebook.php?isbn=".urlencode($row['ISBN'])."&sid=".urlencode($row['std_id1'])."'>{$row['Bname']}</a></h4><p style='display:inline;'> {$row['edition']}th edition</p><br>
					<p style='font-weight:bold; display:inline;'>ISBN: </p> <p style='display:inline;'>{$row['ISBN']}</p><br>
					<p>Author: {$row['auth1']}</p>

					<p>Posted by: {$row['L_name']}</p>\n";
					echo "<p>Status:";
					if ($row['stat']==0) {
						echo "<p class='text-success'> Available</p>";
					}
					else if ($row['stat']==1){
						echo "<p class='text-warning'> Pending Aprooval</p>";
						
					}
					else{
						"<p class='text-Danger'>Unavailable</p>";
					}
					
					echo "</div>
					</div>
					</div>\n
					</div>\n";
				}
				echo "<h4 class='p-3'>My exchange Offers</h4>";

				while ($row2 = mysqli_fetch_assoc($result2)) {
						# code...
					echo "<div class='card  m-3'>
					<div class='card-body'>
					<div class='row'>
					<div class='col-md-3'>
					<div class='view overlay zoom'>
					<a href='myexbook.php?isbn=".urlencode($row2['exISBN'])."&sid=".urlencode($row2['std_id5'])."'><img class='d-flex align-left-start mr-3 z-depth-2' style='width:200px; height:250px;' src='".$row2['Bimage']."'></a></div>
					</div>
					<div class='col-md-6'>
					<h4 style='display:inline;'> <a href='myexbook.php?isbn=".urlencode($row2['exISBN'])."&sid=".urlencode($row2['std_id5'])."'>{$row2['Bname']}</a></h4><p style='display:inline;'> {$row['edition']}th edition</p><br>
					<p style='font-weight:bold; display:inline;'>ISBN: </p> <p style='display:inline;'>{$row2['ISBN']}</p><br>
					<p>Author: {$row2['auth1']}</p>

					<p>Posted by: {$row2['L_name']}</p>\n
					<h5 class='text-success'>in exchange with: {$row2['exBname']} </h5>";
					echo "<p>Status:";
					if ($row2['stat']==0) {
						echo "<p class='text-success'> Available</p>";
					}
					else if ($row2['stat']==1){
						echo "<p class='text-warning'> Pending Aprooval</p>";
						
					}
					else{
						"<p class='text-Danger'>exchanged</p>";
					}
					
					
					echo "</div>
					</div>
					</div>\n
					</div>\n";
				}

 				?>
 			</div>
 	</div>
<div class=" foot blue-gradient container-fluid text-white">
	<div class="row d-flex justify-content-center align-items-top pt-3" align="center">
		<div class="col-sm-3" >
			<h3>About us</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat.</p>
		</div>
		<div class="col-sm-3" >
			<h3>Contact Us</h3>
			<p>info@boishomahar.com</p>
			<p>some adress</p>
			<p>some city</p>
		</div>
		<div class="col-sm-3">
			<h3>Social</h3>
			<a href="" style="color: white">Facebook</a><br>
			<a href="" style="color: white">Twitter</a><br>
			<a href="" style="color: white">Instagram</a><br>
		</div>
	</div>
</div>
</div>
  <!--  SCRIPTS  -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>

</body>
</html>