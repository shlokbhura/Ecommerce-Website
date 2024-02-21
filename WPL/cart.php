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

$email = $_POST['email'];


$sql = "INSERT INTO cart ('email')
VALUES ('$email')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

    
    //send OTP to the user's email
    $to = $_POST['email'];
    $subject = 'order confirmation';
    $message = 'Your order has been successfully placed.';
    $headers = 'From: shlokbhura@gmail.com' . "\r\n" .
                'Reply-To: shlokbhura@gmail.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

    if(mail($to, $subject, $message, $headers)){
        //if OTP sent successfully, redirect to OTP verification page
        header('Location: submit.html');
        exit;
    } else {
        //if OTP sending failed, display error message
        echo "Email not send.";
    }

$conn->close();



exit;

?>