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
if (isset($_POST['sellpost'])) {
  # code...

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
$user_Id = $_SESSION['myid'];

$sql = "INSERT INTO book VALUES('$_POST[isbn]','$user_Id','$_POST[Bname]','$_POST[Fauthor]','$_POST[Sauthor]','$_POST[edition]','$_POST[dept]','$_POST[course]','$_POST[Oprice]','$_POST[type]','$_POST[bookquality]','$folder','$_post[dsc]')";

$sql2 = "INSERT INTO sell VALUES('$_POST[isbn]','$user_Id','$_POST[rprice]','0','0')";

if ($conn->query($sql) && $conn->query($sql2) === TRUE) {
 header('location:booklist.php');
} 
else {
  //header('location:sell.php?id=error');
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
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
    @media (min-width: 992px) {
      .card{
        width: 70%;
      }
    }
    #hidden_div {
      display: none;

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
      <li class="nav-item ">
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
<div class="container-fluid" align="center" style="padding-top:2%;">
  <!-- Material form login -->
  <div class="card mb-5">
    <div class="card-header mb-3 peach-gradient white-text text-center py-4">
     <img class="mb-5" src="img/sell.png" style="width: 8rem;" align="center"><br>
     <h2 class="text-white" style="font-weight: bold;">Sell</h2>
   </div>

   <div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form class="needs-validation" action="" novalidate method="post" enctype="multipart/form-data">
     <div class="mt-3">
    <?php 
        if (!isset($_GET['id'])) {
        }
        else{
          $check = $_GET['id'];
          if ($check == "error") {
            echo "<p class='text-danger'>An error occured!</p>";
          }
        }
       ?>
       </div>
      <div class="form-row">
        <div class="col-md-6 mb-3 md-form">
          <label for="validationCustom012">Book name</label>
          <input type="text" class="form-control" name="Bname" id="validationCustom012"  value=""
          required>

        </div>
        <div class="col-md-6 mb-3 md-form">
          <label for="validationCustom022">Book Edition</label>
          <input type="number" class="form-control" name="edition" id="validationCustom022" min ="1" value="" required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3 md-form">
          <label for="validationCustomUsername2">ISBN-13 Number</label>
          <input type="text" class="form-control" id="validationCustomUsername2" name="isbn" pattern="[0-9]{13}" aria-describedby="inputGroupPrepend2"
          required>
          <div class="invalid-feedback">
            Please use Valid Input.if you are not aware with the ISBN then you can check online by the name of your Book!
          </div>
        </div>
      </div>
      <div class="form-row">
       <div class="col-md-4 mb-3 md-form">
         <select class="mdb-select" onchange="showDiv('hidden_div', this)" name="type" required>
          <option value="" disabled>Book Type</option>
          <option value="Academic">Academic</option>
          <option value="Thriller">Thriller</option>
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
      <div class="col-md-8 mb-3 md-form" id="hidden_div" >
       <div class="form-row">
         <div class="col-md-4 mb-3">
           <select class="mdb-select" name="dept">
            <option value="" disabled>Department</option>
            <option value="Nul">None</option>
            <option value="ARC">ARC</option>
            <option value="BBS">BBS</option>
            <option value="BIL">BIL</option>
            <option value="CSE">CSE</option>
            <option value="EEE">EEE</option>
            <option value="ENH">ENH</option>
            <option value="ESS">ESS</option>
            <option value="MNS">MNS</option>
            <option value="PHR">PHR</option>
            <option value="SOL">SOL</option>

          </select>
        </div>
        <div class="col-md-4 mb-3">
          <input type="text" class="form-control" name="course" pattern="[A-Z,0-9]{6}" id="crs">
          <label for="crs">Course Code</label>
        </div>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-5 mb-3 md-form">
     <select class="mdb-select"  name="bookquality" required>
      <option value="" disabled>Book Condition</option>
      <option value="Blueprint" selected>Blueprint</option>
      <option value="B&W">B&W</option>
    </select>
  </div>
</div>
<div class="form-row">
  <div class="col-md-5 mb-3 md-form">
    <input type="text" id="validationCustom072"  name="Fauthor" class="form-control" required>
    <label for="validationCustom072">First Author's Name</label>
    <div class="invalid-feedback">
      Please provide Authors name of the book
    </div>
  </div>

  <div class="col-md-5 mb-3 md-form">
    <input type="text" id="validationCustom072"  name="Sauthor" class="form-control">
    <label for="validationCustom072">Second Author's Name(optional)</label>

  </div>
</div>


<div class="form-row">
  <div class="col-md-3 mb-3 md-form">
    <label for="validationCustom032">Original Price</label> 
    <input type="number" class="form-control" id="validationCustom032" name="Oprice" min="0" max=5000 required/>
    <div class="invalid-feedback">Please type the Valid Origianal Price</div>
  </div>
  <div class="col-md-3 mb-3 md-form">
   <label for="validationCustom042">New Price</label> 
   <input type="number" class="form-control" id="validationCustom042" name="rprice" min="0" max=10000 required />
 </div>
</div>
<div class="form-row">
  <div class="col-md-6 md-form">
                <textarea id="desc" name="dsc" class="form-control md-textarea" rows="3"></textarea>
                <label for="desc">Book Description...(Max: 120 words)</label>
            </div>
<div class="col-md-6 p-5">
   <p>Upload book cover: <span> 
  <input type="file" name="uploadfile" value="" accept="image/*"></span></p>
  </div>
</div>
<button class="btn btn-primary btn-lg btn-success" type="submit" name="sellpost">Post Ad</button>
</form>
</div><!-- Form -->
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
  <footer>
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/"> boishamahar.com</a>
    </div>
    <!-- Copyright -->

  </footer>      <!--  SCRIPTS  -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('.mdb-select').materialSelect();
    });
  </script>
  <script type="text/javascript">
    (function() {
      'use strict';
      window.addEventListener('load', function() {
// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function(form) {
  form.addEventListener('submit', function(event) {
    if (form.checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
    }
    form.classList.add('was-validated');
  }, false);
});
}, false);
    })();

    function showDiv(divId, element)
    {
      document.getElementById(divId).style.display = element.value == "Academic" ? 'block' : 'none';
    }

  </script>
  <script>    
  </script>
</body>
</html>