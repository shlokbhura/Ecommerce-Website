<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get username and password from form submission
  $email = $_POST['E'];
  $password = $_POST['password'];
$conn = new mysqli($servername, $username, $password, $dbname);
  // Query the database for the user record
  $sql = "SELECT EMAIL, PASSWORD FROM user WHERE EMAIL = '$email'";
  $result = mysqli_query($conn, $sql);

  // Check if the user record exists
  if (mysqli_num_rows($result) == 1) {
    // Verify the password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
      // Set session variables
      $_SESSION["loggedin"] = true;
      $_SESSION["id"] = $row['id'];
      $_SESSION["username"] = $row['username'];
      
      // Redirect to the dashboard or homepage
      header("location: dashboard.php");
    } else {
      // Password is incorrect
      $error = "Invalid password";
    }
  } else {
    // Username not found
    $error = "Invalid username";
  }

  // Close the database connection
  mysqli_close($conn);
  header("Location: submit.html");
  exit;
}
?>