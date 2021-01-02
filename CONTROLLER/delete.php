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
        $pid=$_SESSION['ISBN'];
        $query = "DELETE FROM book WHERE isbn='$pid'";
        $result = mysqli_query($conn, $sql);
        
       if($result){
  echo "<font color ='green'>Data deleted Successfully";
}else{
  echo "<font color='red'>Sorry, Failed to delete";
}

      ?>
     
      
    </div>
    </div>
  </div>
  </div>  


  </body>


</html>