<?php 

if (isset($_GET['submit'])) {
  header('location:home.php');
 } ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="mystyle.css">
  <style type="text/css">
    @media (min-width: 992px) {
      .card{
        width: 70%;
      }
    }
  </style>
</head>
<body>
  <div class="container" align="center" style="padding-top:2%;">
    <img class="mb-3" src="img/logo.png" style="width: 10rem;" align="center">
    <!-- Material form login -->
    <div class="card mb-5">
      <h5 class="card-header aqua-gradient white-text text-center py-4">
        <strong>Registration</strong>
      </h5>

      <div class="card-body px-lg-5 pt-0">
        <div class="mt-3">
          <?php 
          if (!isset($_GET['id'])) {
          }
          else{
            $check = $_GET['id'];
            if ($check == "error") {
              echo "<p class='text-danger'>User ID already used!</p>";
            }
          }
          ?>
        </div>
        <!-- Form -->
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
        if (isset($_GET['update']) && !empty($_GET['update'])) {
        $id = $_GET['update'];
      
        $sql = "SELECT * FROM users WHERE user_ID = '$id'";
        $result = mysqli_query($conn, $sql);
        while ($row1 = mysqli_fetch_assoc($result)) {
          # code...
       echo "
        <form class='needs-validation'  novalidate method='get' enctype='multipart/form-data'>
          <div class='form-row'>
            <div class='col-md-6 mb-3 md-form'>
              <label for='validationCustom012'>First name</label>
              <input type='text' class='form-control' name='fname' id='validationCustom012'  value='{$row1['F_name']}'
              required>
              <div class='valid-feedback'>
                Looks good!
              </div>
            </div>
            <div class='col-md-6 mb-3 md-form'>
              <label for='validationCustom022'>Last name</label>
              <input type='text' class='form-control' name='lname' id='validationCustom022' value='{$row1['L_name']}' required>
              <div class='valid-feedback'>
                Looks good!
              </div>
            </div>
          </div>
          <div class='form-row'>
            <div class='col-md-8 mb-3 md-form disabled'>
              <label for='alidationCustomUsername2'></label>
              <input type='text' class=form-control disabled' id='validationCustomUsername2' name='userId' value='{$row1['user_ID']}' pattern='[0-9]{8}'' aria-describedby='inputGroupPrepend2'>
              <div class='invalid-feedback'>
                Please use Bracu ID.
              </div>
            </div>
            <div class='col-md-4 mb-3 md-form'>
             <select class='mdb-select'  name='dept' required>
              <option value='' disabled>Department</option>
            <option value='ARC'>ARC</option>
            <option value='BBS'>BBS</option>
            <option value='BIL'>BIL</option>
            <option value='CSE'>CSE</option>
            <option value='EEE'>EEE</option>
            <option value='ENH'>ENH</option>
            <option value='ESS'>ESS</option>
            <option value='MNS'>MNS</option>
            <option value='PHR'>PHR</option>
            <option value='SOL'>SOL</option>
            </select>
          </div>
        </div>
        <div class='form-row'>
          <div class='col-md-6 mb-3 md-form'>
            <input type='email' id='validationCustom072'  name='email' value='{$row1['email']}' class='form-control' required>
            <label for='validationCustom072'>E-mail</label>
            <div class='invalid-feedback'>
              Please provide E-mail Address
            </div>
          </div>
        </div>
        <div class='form-row'>
          <div class='col-md-6 mb-3 md-form'>
            <label for='validationCustom032'>Password</label> 
            <input type='password' class='form-control' id='validationCustom032' name='pass' value='{$row1['pass']}'required/>
            <div id='divCheckPassword'></div>
          </div>
          <div class='col-md-6 mb-3 md-form'>
           <label for='validationCustom042'>Retype Password</label> 
           <input type='password' class='form-control' id='validationCustom042' value='{$row1['pass']}' onChange='isPasswordMatch();' required />
         </div>
       </div>
       <div class='form-row'>
        <div class='col-md-4 mb-3 md-form'>
         <div class='md-form'>
          <input type='text' class='form-control' id='validationCustom052' value='{$row1['street']}' name='street'
          required>
          <label for='validationCustom052'>street</label>
          <div class='invalid-feedback'>
            please provide a #street.
          </div>
        </div>
      </div>

      <div class='col-md-4 mb-3 md-form'>
       <div class='md-form'>
        <input type='text' class='form-control' id='validationCustom052' value='{$row1['city']}' name='city'
        required>
        <label for='validationCustom052'>City</label>
        <div class='invalid-feedback'>
          please provide your city.
        </div>
      </div>
    </div>

    <div class='col-md-4 mb-3 md-form'>
     <div class='md-form'>
      <input type='text' class='form-control' id='validationCustom052'  name='postcode'
       value='{$row1['postcode']}'required>
      <label for='validationCustom052'>postcode</label>
      <div class='invalid-feedback'>
        please provide a #postcode.
      </div>
    </div>
  </div>
</div>
<div class='form-row'>
  <div class='col-md-6 mb-3 md-form'>
    <label for='validationCustom052'>Mobile Number</label>
    <input type='tel' class='form-control' id='validationCustom052' name='mob' value='{$row1['mobile']}' pattern='[0-9]{11}'' required>
    <div class='invalid-feedback'>
      Please provide a valid Number.
    </div>
  </div>

  <div class='col-md-6 mb-3'>

    <p>Gender: </p>  
    <div class='form-check form-check-inline'>
      <input type='radio' class='form-check-input' id='male' '{$row1['gender']}'  name='gender'>
      <label class='form-check-label' for='male'>Male</label>
    </div>
    <!-- Material inline 2 -->
    <div class='form-check form-check-inline'>
      <input type=radio class=form-check-input id=female value=Female name=gender>
      <label class=form-check-label for=female>Female</label>
    </div>
    <div class=form-check form-check-inline>
      <input type=radio class='form-check-input id=other value=Other name=gender>
      <label class=form-check-label for=other>other</label>
    </div>

  </div>
  <div class=form-row>
   <p>Upload profile Picture: <span> 
    <input type=file name=uploadfile value=''{$row1['image']}'' accept='image/*'></span></p>
  </div>

  <button class='btn btn-primary btn-md btn-success' type='submit'>Update</button>
</form>";
}
}
?>
</div><!-- Form -->
</div>
</div>

<!-- JQuery -->
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
</script>
<script>
  function isPasswordMatch() {
    var password = $("#validationCustom032").val();
    var confirmPassword = $("#validationCustom042").val();

    if (password != confirmPassword) $("#divCheckPassword").html("Passwords do not match!");
    else $("#divCheckPassword").html("Passwords match.");
  }

  $(document).ready(function () {
    $("#validationCustom042").keyup(isPasswordMatch);
  });    

</script>
</body>
</html>