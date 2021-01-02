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
	$reqId = $_SESSION['myid'];
	$ownID = $_SESSION['ownerID'];
	$sellisb = $_SESSION['sellisbn'];
	$sql2 = "SELECT * FROM exchange_with WHERE std_id5='$ownID' AND exISBN = '$sellisb' AND std_id5 !='$reqId'";
	$result = mysqli_query($conn, $sql2);
	$row = mysqli_fetch_array($result,MYSQLI_NUM);
	$num = mysqli_num_rows($result);
 	if($num==1){
	header('location:exchange.php');
	}
	else {
		die(header('location:indbookex.php?id=error'));
	}
}
if (isset($_POST['acpt'])){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname= "boishomahar";

// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$reqISBN = $_SESSION['exISBN'];
	$ownID = $_SESSION['myid'];
	$reqid= $_SESSION['reqid'];
	$sell = "UPDATE exchange_with SET stat='3' WHERE exISBN ='$reqISBN' AND req_id ='$reqid'";
	
	if($conn->query($sell) === TRUE) {
	header("Refresh:0");
	}
	else {
		die(header('location:myexbook.php?id=error'));
	}
}
else if (isset($_POST['rjct'])){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname= "boishomahar";

// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$reqISBN = $_SESSION['exISBN'];
	$reqID = $_SESSION['reqid'];
	$sell = "UPDATE exchange_with SET stat='0', req_id='0' WHERE exISBN='$reqISBN' AND req_id='$reqID'";
	
	if($conn->query($sell) === TRUE) {
	header("Refresh:0");
	}
	else {
		
		//echo "Error: " . $sql . "<br>" . $conn->error;
		die(header('location:myexbook.php?id=error'));
	}

}
if (isset($_POST['dlt'])){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname= "boishomahar";

// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$id=$_SESSION['myid'];
	$pid=$_SESSION['sellisbn'];
    $dlt = "DELETE FROM exchange_with WHERE exISBN='$pid' AND std_id5=$id";
	if($conn->query($dlt) === TRUE) {
	header("Refresh:0");
	}
	else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		//die(header('location:mysalebook.php?id=error'));
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
<div class="container-fluid">
<div class="card">
	<h5 class="p-3">Book Details</h5>
	<hr>
	<div class="card-body mt-3">

		<?php 
          if (!isset($_GET['id'])) {
          }
          else{
            $check = $_GET['id'];
            if ($check == "error") {
              echo "<p class='text-danger'>You cant exchange with your own exchange offer book!</p>";
            }
          }
          ?>
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
				if (isset($_GET['isbn']) && !empty($_GET['isbn']) AND isset($_GET['sid']) && !empty($_GET['sid'])) {
				$ownisbn = $_GET['isbn'];
				$_SESSION['sellisbn'] = $ownisbn;
				$ownid = $_GET['sid'];
				$_SESSION['ownerID'] = $ownid;
				
				$sql ="SELECT * FROM (((users INNER JOIN book ON users.user_ID=book.std_id) INNER JOIN offered ON offered.ISBN = book.ISBN AND offered.std_id3=book.std_id) INNER JOIN exchange_with ON exchange_with.std_id5=offered.std_id3 AND exchange_with.exISBN=offered.exISBN)WHERE exchange_with.exISBN='$ownisbn' AND std_id5 = '$ownid'";
				
				$result = mysqli_query($conn, $sql);
				$num = mysqli_num_rows($result);
				while ($row = mysqli_fetch_assoc($result)) {
					echo "
					<div class='card-body'>
					<div class='row'>
					<div class='col-md-4'>
					<img class='d-flex align-left-start mr-3 z-depth-2' style='width:400px; height:auto;' src='".$row['Bimage']."'>
					</div>
					<div class='col-md-6'>
					<h4 class='text-primary' style='display:inline;'> <a href=''>{$row['Bname']}</a></h4><p style='display:inline;'> {$row['edition']}th edition</p><br>
					<p style='font-weight:bold; display:inline;'>ISBN: </p> <p style='display:inline;'>{$row['ISBN']}</p><br>
					<p>1st Author: {$row['auth1']} <br> 2nd Author: {$row['auth2']}</p>
					<p style='font-weight:bold; display:inline;'>Book category: </p> <p style='display:inline;'>{$row['type']} | </p><p style='font-weight:bold;display:inline;'> Department:</p> <p style='display:inline'>{$row['bdept']} |</p><p style='font-weight:bold;display:inline;'> course: <p style='display:inline;'>{$row['course']}</p>
					<p>Description: <br>
					{$row['dsc']}</p>	
					<p>Posted by: {$row['L_name']} </p>
					<p>email: <a href=''>{$row['email']}</a><p>
					<p>Contact: {$row['mobile']}</p>
					<h6 class='text-danger'>Original Price: {$row['org_price']} &#x09F3;</h6>\n
					<h5 class='text-success'>in exchange with: {$row['exBname']} </h5>";
					$ureq_id = $row['req_id'];
					$_SESSION['reqid']=$ureq_id;
					$reqISBN = $row['exISBN'];
					$_SESSION['exISBN']=$reqISBN;
					$ureq = "SELECT * FROM users WHERE user_ID = '$ureq_id'";
					$ureqresult = mysqli_query($conn, $ureq);
					$num = mysqli_num_rows($ureqresult);
					while ($ureqrow = mysqli_fetch_assoc($ureqresult)) {
						$reqfname=$ureqrow['F_name'];
						$reqlname=$ureqrow['L_name'];
						$reqemail =$ureqrow['email'];
						$reqmob =$ureqrow['mobile'];
					}
					$orgISBN=$row['ISBN'];
					$_SESSION['orgISBN']=$orgISBN;
					if ($row['stat']==0) {
						echo "<p>Status: </p> <p class='text-success'> Available</p>";
					}
					else if($row['stat']==1){
						echo "<p>Status: </p><p class='text-warning'> Pending Aprooval</p>";
					}
					else{
						"<p>Status: </p><p class='text-danger'> Unavailable</p>";
					}
					if ($row['stat']==0) {
						echo "
						<form action='' method='post'>
						<button class='btn btn-warning' type='submit' name='edt'>edit</button>
						<button class='btn btn-danger' type='submit' name='dlt'>REMOVE</button>
						</form>";
					}
					else if ($row['stat']==1) {
						echo "
						<form action='' method='post'>
						<h5>Requested By:</h5>
						<hr>
						<p>Name: ".$reqfname." ".$reqlname."</p>
						<p>Email: ".$reqemail."</p>
						<p>Mobile: ".$reqmob."</p>
						<button class='btn btn-success' type='submit' name='acpt'>Aceept exchange ?</button>
						<button class='btn btn-danger' type='submit' name='rjct'>Reject</button>
						</form>";
					}
					else{
						echo "<button class='btn btn-disabled'>exchanged</button>
						<button class='btn btn-danger' type='submit' name='dlt'>REMOVE</button>";
					}
					echo "</div>
					</div>";
				}
			}
				else{
				}
				 ?>
				
		</div>
	</div>
</div>
</div>

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