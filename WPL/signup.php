<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-com";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username = $_POST["fname"];
$email = $_POST["email"];
$password = $_POST["pass"];


$sql = "INSERT INTO user(username, email, password) VALUES ('$username', '$email', '$password')";

if (!$conn->query($sql)) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
if(isset($_POST['submit'])){
    //generate a random 6 digit OTP
    $otp = rand(100000,999999);
    
    //send OTP to the user's email
    $to = $_POST['email'];
    $subject = 'OTP for login verification';
    $message = 'Your 6 digit OTP is '.$otp;
    $headers = 'From: trendsetters464@gmail.com' . "\r\n" .
                'Reply-To: trendsetters464@gmail.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

    if(mail($to, $subject, $message, $headers)){
        //if OTP sent successfully, redirect to OTP verification page
        header('Location: otp.html?email='.$to.'&otp='.$otp);
        exit;
    } else {
        //if OTP sending failed, display error message
        echo "Failed to send OTP. Please try again.";
    }
}
?>