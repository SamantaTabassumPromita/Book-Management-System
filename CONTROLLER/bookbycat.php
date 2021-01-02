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

 ?>
<?php 
if (isset($_POST['req'])){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname= "boishomahar";

// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$reqId = $_SESSION['id'];
	$ownID = $_SESSION['ownerID'];
	$sellisb = $_SESSION['sellisbn'];
	$sql2 = "UPDATE sell SET stat='1', req_id='$reqId' WHERE std_id1='$ownID' AND ISBN = '$sellisbn' AND std_id1 !='$reqId'";	
	if($conn->query($sql2) === TRUE) {
		header('location:booklist.php?id=check');
	}
	else {
		die(header('location:booklist.php?id=error'));
	}
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
	<style type="text/css">
		ul{
			list-style-type: none;
		}
		li{
			list-style-type: none;
		}
		li > a{
			color: black;
		}

	</style>
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
				<div class="md-form mt-3">
					<form class="form-inline md-form mr-auto mb-4" action="" method="post">
				<input class="form-control mr-sm-2" type="text" name="query" style="width: 70%;" placeholder="search" aria-label="search">
  				<button class="btn btn-primary  btn-sm my-0" name="search" type="submit">Search</button>
  				</form>
				</div>
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
			<li class="nav-item">
				<a class="nav-link" href="home.php">Home
				</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="booklist.php">Library</a>
				<span class="sr-only">(current)</span>
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
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div class="card">
				<div class="card-body">
					<ul class="custom-scrollbar">
						<li>
							<ul class="collapsible collapsible-accordion">
								<li>
									<h2>Categories</h2>
								</li>
								<hr>
								<li><button class="collapsible-header waves-effect arrow-r btn btn-block mb-2">
									Academic <i class="fas fa-angle-down rotate-icon"></i></button>
									<div class="collapsible-body" style="padding-left: 15px;">
										<ul>
											<li><a href="#" class="disabled" style="color: rgba(0,0,0,0.5);">Department</a>
											</li>
											<li><a href="booklistbytype.php?dept=ARC" class="waves-effect btn btn-block mb-2">ARC</a></li>
											<li><a href="booklistbytype.php?dept=BBS" class="waves-effect btn btn-block mb-2">BBS</a></li>
											<li><a href="booklistbytype.php?dept=BIL" class="waves-effect btn btn-block mb-2">BIL</a></li>
											<li><a href="booklistbytype.php?dept=CSE" class="waves-effect btn btn-block mb-2">CSE</a></li>
											<li><a href="booklistbytype.php?dept=EEE" class="waves-effect btn btn-block mb-2">EEE</a></li>
											<li><a href="booklistbytype.php?dept=ENH" class="waves-effect btn btn-block mb-2">ENH</a></li>
											<li><a href="booklistbytype.php?dept=ESS" class="waves-effect btn btn-block mb-2">ESS</a></li>
											<li><a href="booklistbytype.php?dept=MNS" class="waves-effect btn btn-block mb-2">MNS</a></li>
											<li><a href="booklistbytype.php?dept=PHR" class="waves-effect btn btn-block mb-2">PHR</a></li>
											<li><a href="booklistbytype.php?dept=SOL" class="waves-effect btn btn-block mb-2">SOL</a></li>
										</ul>
										<hr>			
									</div>
								</li>
								
								<li><a href="bookbycat.php?cat=Thriller" class="waves-effect btn btn-block mb-2">Thriller</a></li>
								<li><a href="bookbycat.php?cat=Fantasy" class="waves-effect btn btn-block mb-2">Fantasy</a></li>
								<li><a href="bookbycat.php?cat=Science Fiction" class="waves-effect btn btn-block mb-2">Science Fiction</a></li>
								<li><a href="bookbycat.php?cat=Western" class="waves-effect btn btn-block mb-2">Western</a></li>
								<li><a href="bookbycat.php?cat=Romance" class="waves-effect btn btn-block mb-2">Romance</a></li>
								<li><a href="bookbycat.php?cat=Mystery" class="waves-effect btn btn-block mb-2">Mystery</a></li>
								<li><a href="bookbycat.php?cat=Detective" class="waves-effect btn btn-block mb-2">Detective</a></li>
								<li><a href="bookbycat.php?cat=Biography" class="waves-effect btn btn-block mb-2">Biography</a></li>
								<li><a href="bookbycat.php?cat=Play" class="waves-effect btn btn-block mb-2">Play</a></li>
								<li><a href="bookbycat.php?cat=Music" class="waves-effect btn btn-block mb-2">Music</a></li>
								<li><a href="bookbycat.php?cat=Horror" class="waves-effect btn btn-block mb-2">Horror</a></li>
								<li><a href="bookbycat.php?cat=Dictionary" class="waves-effect btn btn-block mb-2">Dictionary</a></li>
								<li><a href="bookbycat.php?cat=Literature" class="waves-effect btn btn-block mb-2">Literature</a></li>
								<li><a href="bookbycat.php?cat=Novel" class="waves-effect btn btn-block mb-2">Novel</a></li>
								<li><a href="bookbycat.php?cat=Others" class="waves-effect btn btn-block mb-2">Others</a></li>
							</ul>
						</li>		
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="mt-3">
				<?php 
				if (!isset($_GET['id'])) {
				}
				else{
					$check = $_GET['id'];
					if ($check == "error") {
						echo "<p class='text-danger'>you cannot request your own book!</p>";
					}
					else if($check == "check"){
						echo "hello checked";
					}
					else{

					}
				}
				?>
			</div>
			<div class="card mt-3">
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
				if (isset($_GET['cat']) && !empty($_GET['cat'])) {
				$catdept = $_GET['cat'];

				$sql ="SELECT * FROM ((users INNER JOIN book ON users.user_ID=book.std_id) INNER JOIN sell ON sell.ISBN = book.ISBN AND sell.std_id1=book.std_id) WHERE book.type = '$catdept'";
				$sql2 ="SELECT * FROM (((users INNER JOIN book ON users.user_ID=book.std_id) INNER JOIN offered ON offered.ISBN = book.ISBN AND offered.std_id3=book.std_id) INNER JOIN exchange_with ON exchange_with.std_id5=offered.std_id3 AND exchange_with.exISBN=offered.exISBN) WHERE book.type = '$catdept'";
				$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
				$result2 = mysqli_query($conn, $sql2)or die(mysqli_error($conn));
				$num = mysqli_num_rows($result);
				echo "<h4 class='p-3'>For sale: {$num} result(s) </h4>";
				while ($row = mysqli_fetch_assoc($result)) {
						# code...
					echo "<div class='card  m-3'>
					<div class='card-body'>
					<div class='row'>
					<div class='col-md-3'>
					<div class='view overlay zoom'>
					<a href='indbook.php?isbn=".urlencode($row['ISBN'])."&sid=".urlencode($row['std_id1'])."'><img class='d-flex align-left-start mr-3 z-depth-2' style='width:200px; height:250px;' src='".$row['Bimage']."'></a></div>
					</div>
					<div class='col-md-6'>
					<h4 style='display:inline;'> <a href='indbook.php?isbn=".urlencode($row['ISBN'])."&sid=".urlencode($row['std_id1'])."'>{$row['Bname']}</a></h4><p style='display:inline;'> {$row['edition']}th edition</p><br>
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
				
				$num2=mysqli_num_rows($result2);
				echo "<h4 class='p-3'>For exchange: {$num2} result(s) </h4>";

				while ($row2 = mysqli_fetch_assoc($result2)) {
						# code...
					echo "<div class='card  m-3'>
					<div class='card-body'>
					<div class='row'>
					<div class='col-md-3'>
					<div class='view overlay zoom'>
					<a href='indbookex.php?isbn=".urlencode($row2['exISBN'])."&sid=".urlencode($row2['std_id5'])."'><img class='d-flex align-left-start mr-3 z-depth-2' style='width:200px; height:250px;' src='".$row2['Bimage']."'></a></div>
					</div>
					<div class='col-md-6'>
					<h4 style='display:inline;'> <a href='indbook.php?isbn=".urlencode($row2['exISBN'])."&sid=".urlencode($row2['std_id5'])."'>{$row2['Bname']}</a></h4><p style='display:inline;'> {$row['edition']}th edition</p>\n
					<p style='font-weight:bold; display:inline;'>ISBN: </p> <p style='display:inline;'>{$row2['ISBN']}</p><br>
					<p>Author: {$row2['auth1']}</p>
					<p>Posted by: {$row2['L_name']}</p>\n
					<h5 class='text-success'>in exchange with: {$row2['exBname']} </h5>";
					echo "<p>Status:";
					if ($row2['stat']==0) {
						echo "<p class='text-success'> Available</p>";
					}
					else if ($row2['stat']==1){
						echo "<p class='text-warning'> Pending</p>";
						
					}
					else{
						"<p class='text-Danger'>Unavailable</p>";
					}
					
					echo "</div>
					</div>
					</div>\n
					</div>\n";
				}
			}

				?>
			</div>
		</div>
	</div>
</div>
<!--Footer-->
<!-- Footer -->
<footer class="page-footer font-small primary-color">

	<!-- Footer Elements -->
	<div class="container">

		<!-- Grid row-->
		<div class="row">

			<!-- Grid column -->
			<div class="col-md-12 py-5">
				<div class="mb-5 flex-center">

					<!-- Facebook -->
					<a class="fb-ic">
						<i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
					</a>
					<!-- Twitter -->
					<a class="tw-ic">
						<i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
					</a>
					<!-- Google +-->
					<a class="gplus-ic">
						<i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
					</a>
					<!--Linkedin -->
					<a class="li-ic">
						<i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
					</a>
					<!--Instagram-->
					<a class="ins-ic">
						<i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
					</a>
					<!--Pinterest-->
					<a class="pin-ic">
						<i class="fab fa-pinterest fa-lg white-text fa-2x"> </i>
					</a>
				</div>
			</div>
			<!-- Grid column -->

		</div>
		<!-- Grid row-->

	</div>
	<!-- Footer Elements -->

	<!-- Copyright -->
	<div class="footer-copyright text-center py-3">© 2018 Copyright:
		<a href="https://mdbootstrap.com/education/bootstrap/"> boishamahar.com</a>
	</div>
	<!-- Copyright -->

</footer>
<!-- Footer -->


<!--  SCRIPTS  -->
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript">

</script>
</body>
</html>