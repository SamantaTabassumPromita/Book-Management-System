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
		<!--buy/sell/exchange-->
		<div class="tabs container-fluid ">
			<div class="row d-flex justify-content-center mt-4 p-2 text-center">
				<div class="col-lg-3 p-2 zoom" align="center">
					<a class="btn blue-gradient" href="buy.php" style="width: 80%; height: 100%;" role="button">
						<img src="img/buy.png" style="width: 5rem;">
						<hr>
						<h2 style="font-weight: bold;">Buy</h2>
						<p>Buy your desired books!</p>
					</a>
				</div>
				<div class="col-lg-3 p-2 zoom" align="center">
					<a class="btn peach-gradient white-text" href="sell.php" style="width: 80%; height: 100%;"  role="button">
						<img src="img/sell.png" style="width: 5rem;">
						<hr>
						<h2 class="text-white" style="font-weight: bold;">Sell</h2>
						<p class="text-white">Sell your old book!</p>
						
					</a>
				</div>
				<div class="col-lg-3 p-2 zoom" align="center">
					<a class="btn aqua-gradient" href="exchange.php" style="width: 80%; height: 100%;" role="button">
						<img src="img/exchange.png" style="width: 5rem;">
						<hr>
						<h2 style="font-weight: bold;">Exchange</h2>
						<p>A book for a book!</p>
					</a>
				</div>
			</div>
		</div>
		<!--buy/sell/exchange-->
	<div class="decribe container-fluid pl-5">
		<div class="row d-flex justify-content-center" align="center">
			<div class="col-sm pt-5" align="left">
				<h2> What are we ?</h2>
				<p>Simply, A book sharing platform for the book lovers! <br>
				people can buy, sell or exhange their old books. Our goal is to build a community for the book lovers out there.	
				</p>
			</div>
			<div class="col-sm">
				<img src="img/describe.png" class="image-fluid" style="width: 70%;">
			</div>
		</div>
	</div>
<!--sub section-->
<div class="container-fluid cloudy-knoxville-gradient">
	<h3 class="text-center pt-3" style="font-weight: bold;"> Popular Category</h3>
<div class="row p-3">
		<div class="col-sm-3 p-2">
			<div class="view overlay zoom">
			<a href="bookbycat.php?cat=Academic"><img src="img/department.jpg" href="#" style="width: 100%"></a> 
			</div>
		</div>
		<div class="col-sm-3 p-2">
			<div class="view overlay zoom">
			<a href="bookbycat.php?cat=Science Fiction"><img src="img/science.jpg" style="width: 100%"></a> 
			</div>
		</div>
		<div class="col-sm-3 p-2">
			<div class="view overlay zoom">
			<a href="bookbycat.php?cat=Thriller"><img src="img/drama.jpg" style="width: 100%"></a> 
			</div>
		</div>
		<div class="col-sm-3 p-2">
			<div class="view overlay zoom">
			<a href="bookbycat.php?cat=Fantasy"><img src="img/action.jpg" style="width: 100%"></a>
			</div>
		</div>
		
</div>
<div class="row p-3">
	<div class="col-sm-3 p-2">
			<div class="view overlay zoom">
			<a href="bookbycat.php?cat=Novel"><img src="img/history.jpg" style="width: 100%"></a>
			</div>
	</div>
	<div class="col-sm-3 p-2">
			<div class="view overlay zoom">
			<a href="bookbycat.php?cat=Others"><img src="img/more.jpg" style="width: 100%"></a>
			</div>
	</div>
</div>
</div>
<div class="container-fluida">
	<h3 class="text-center pt-3" style="font-weight: bold;"> Can't find your Book ?</h3>
	<div class="text-center">
	<a href="wish.php"><button class="btn btn-lg btn-success mb-3" style="font-size: 20px;">Make a Wish</button></a>
	</div>
	<p class="text-center">It's just like magic! Wish your desired book to us, we will find the wizard for you!</p>
</div>

<div class="categories container-fluid">
	<div class="row">
		<div class="col-md-4">
			
		</div>
		<div class="col-md-4">
			
		</div>
		<div class="col-md-4">
			
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
<footer>
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

</body>
</html>