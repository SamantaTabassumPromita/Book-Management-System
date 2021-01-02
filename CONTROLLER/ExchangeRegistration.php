<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<!-- Bootstrap core CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
	<!-- JQuery -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>
	<title>Boi Shomahar</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
	 <div class="head">
	 	<div class="row m-4">
	 		<div class="col-sm">
	 			<img src="logo.png" style="width: 10rem;">
	 		</div>
	 		<div class="col-sm-4">
	 			<!-- Search form -->
				<div class="md-form mt-3">
				  <input class="form-control" type="text" placeholder="Search" aria-label="Search">
				</div>
	 		</div>
	 		<div class="col-sm">
				<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header text-center">
			        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body mx-3">
			        <div class="md-form mb-5">
			          <i class="fas fa-envelope prefix grey-text"></i>
			          <input type="email" id="defaultForm-email" class="form-control validate">
			          <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
			        </div>

			        <div class="md-form mb-4">
			          <i class="fas fa-lock prefix grey-text"></i>
			          <input type="password" id="defaultForm-pass" class="form-control validate">
			          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
			        </div>
			        <p>Not a member? <a href="#" class="blue-text">Sign Up</a></p>
			        <p>Forgot <a href="#" class="blue-text">Password?</a></p>
			      </div>
			      <div class="modal-footer d-flex justify-content-center">
			        <button class="btn btn-success">Login</button>
			      </div>
			    </div>
			  </div>
			</div>

			<div class="text-center">
			  <a href="" class="btn btn-primary btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">Sign In</a>
			</div>
			</div>
		</div>
	</div>
	<!--Navbar starts-->
		<nav class="navbar  sticky-top navbar-expand-lg navbar-dark primary-color">

		  <!-- Navbar brand -->
		  <a class="navbar-brand" href="#">Boi-Shomahar</a>

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
		        <a class="nav-link" href="#">Home
		          <span class="sr-only">(current)</span>
		        </a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Library</a>
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





<!------------YOUR BOOK--------------->
 <body>
<div class="container-fluid">
  
<div class="row" >

<div class="col-md-5 login-left" style=" padding-left: 10%">
<h2 style="padding-top: 10%" align="center"> Your Book </h2>
<form action="registration.php" method="post">

<div class="form-group">
<label> Book Name  </label>
<input type="text" name="user" class="form-control" required>
</div>

<div class="form-group">
<label> 13-Digit ISBN</label>
<input type="text" name="myISBN" class="form-control" id="myISBN" pattern="[0-9]{13}" required>
</div>

<div class="row">
	<div class="col-md-6">
<div class="form-group">
	<label>First Author</label>
	<input type="text" name="myAuthor1" class="form-control" id="myAuthor1" required>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
	<label>Second Author</label>
	<input type="text" name="myAuthor2" class="form-control" id="myAuthor2" optional>
</div>
</div>

</div>

<div class="form-group">
	<div class="row">
	<div class="col-md-6">
<label> Book Edition </label>
<input type="number" name="myEdition" class="form-control" id="myEdition" min="1" max="50">
</div>


<div class="col-md-3  md-form">
           <select class="mdb-select"  name="dept" required>
                <option value="" disabled>Department</option>
                <option value="CSE" selected>CSE</option>
                <option value="EEE">EEE</option>
                <option value="BBA">BBA</option>
                <option value="PHR">PHR</option>
                <option value="ARC">ARC</option>
            </select>
      </div>



      <div class="col-md-3  md-form">
           <select class="mdb-select"  name="dept" required>
                 <option value="" disabled>Book Type</option>
                <option value="1">Academic</option>
                <option value="2" selected>Thriller</option>
                <option value="3">Fantasy</option>
                <option value="4">Science fiction</option>
                <option value="5">Western</option>
                <option value="6">Romance</option>
                <option value="7">Mystery</option>
                <option value="8">Detective</option>
                <option value="9">Dystopia</option>
                <option value="10">Biography</option>
                <option value="11">Play</option>
                <option value="12">Musical</option>
                <option value="13">Horror</option>
                <option value="14">Dictionary</option>
                <option value="15">literature</option>
                <option value="16">Novel</option>
                <option value="17">Others</option>
            </select>
      </div>

</div>
</div>

</form>
</div>











<!-------------EXCHANGE WITH--------------->
<div class="col-md-5 login-right" style="padding-left: 10% " >
<h2 style="padding-top:10%" align="center"> Exchange With </h2>
<form action="registration.php" method="post">

<div class="form-group">
<label>Book Name </label>
<input type="text" name="user" class="form-control" required>
</div>

<div class="form-group">
<label> 13-Digit ISBN</label>
<input type="text" name="yourISBN" class="form-control" id="yourISBN" pattern="[0-9]{13}" required>
</div>

<div class="row">
	<div class="col-md-6">
<div class="form-group">
	<label>First Author</label>
	<input type="text" name="yourAuthor1" class="form-control" id="yourAuthor1" required>
</div>
</div>

	<div class="col-md-6">
<div class="form-group">
	<label>Second Author</label>
	<input type="text" name="yourAuthor2" class="form-control" id="yourAuthor2" optional>
</div>
</div>

</div>

<div class="form-group">
	<div class="row">
	<div class="col-md-6">
<label> Book Edition </label>
<input type="number" name="myEdition" class="form-control" id="myEdition" min="1" max="50" >
</div>


<div class="col-md-3  md-form">
           <select class="mdb-select"  name="dept" required>
                <option value="" disabled>Department</option>
                <option value="CSE" selected>CSE</option>
                <option value="EEE">EEE</option>
                <option value="BBA">BBA</option>
                <option value="PHR">PHR</option>
                <option value="ARC">ARC</option>
            </select>
      </div>



      <div class="col-md-3  md-form">
           <select class="mdb-select"  name="dept" required>
                 <option value="" disabled>Book Type</option>
                <option value="Academic">Academic</option>
                <option value="Thriller" selected>Thriller</option>
                <option value="Fantasy">Fantasy</option>
                <option value="Science fiction">Science fiction</option>
                <option value="Western">Western</option>
                <option value="Romance">Romance</option>
                <option value="Mystery">Mystery</option>
                <option value="Detective">Detective</option>
                <option value="Dystopia">Dystopia</option>
                <option value="Biography">Biography</option>
                <option value="Play">Play</option>
                <option value="Musical">Musical</option>
                <option value="Horror">Horror</option>
                <option value="Dictionary">Dictionary</option>
                <option value="literature">literature</option>
                <option value="Novel">Novel</option>
                <option value="Others">Others</option>
            </select>
      </div>

</div>

 


</div>

<!--------------------BUTTON----------------------->
<div style="padding-top: 12%" align="center">
  <button type="request" class="btn btn-primary" id="request">Request</button>
  </div>

<!--------------------BUTTON----------------------->

</form>
</div>

</div>




</div>
 </body>


<!-------------ending of your code--------------->
<!--Footer-->
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
</body>
</html>


