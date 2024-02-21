<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$First_name = $_POST['FN'];
$last_name = $_POST['LN'];
$email = $_POST['E'];
$password = $_POST['password'];
$address = $_POST['address'];
$state = $_POST['state'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];

$sql = "INSERT INTO user (FN, LN, EMAIL , PASSWORD , ADDRESS , STATE , CITY , PINCODE )
VALUES ('$First_name', '$last_name', '$email' , '$password' , '$address', '$state', '$city' , '$pincode' )";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: submit.html");

exit;

?>