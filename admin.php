<?php
session_start();
$email  = $password ="";
$emailErr = $passwordErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$serv = "localhost";
$user = "root";
$pass = "";
$db = "employee";

if(($email=='admin@gmail.com')&&($password=='admin@25'))
{
  echo '<script>window.alert("Welcome admin")</script>';
  echo "<script>setTimeout(function(){window.location.href='attend.php'},100);</script>";
}
else{
  echo '<script>window.alert("Login Error!")</script>';
  echo "<script>setTimeout(function(){window.location.href='admin.html'},100);</script>";
}

 ?>
