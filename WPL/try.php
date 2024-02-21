<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kashvi";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else{
    //echo "Sucessfully connected";
}
$First_name = $_POST['FN'];
$last_name = $_POST['LN'];
$age = $_POST['AGE'];
$gender = $_POST['GENDER'];


$sql = "INSERT INTO kash (FN, LN, AGE, GENDER)
VALUES ('$First_name', '$last_name', '$age' , '$gender'  )";
if (mysqli_query($conn,$sql)) {
    echo "New record created successfully with kashvi";
  } else {
    echo "Error: " . $sqli_error($conn);
  }
  
mysqli_close($conn);
  
  header("Location: submit.html");

  exit;
  ?>