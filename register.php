<?php
$name = $email  = $password = "";
$nameErr = $emailErr = $passwordErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Username is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

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

$conn = new mysqli($serv,$user,$pass,$db);

if($conn->connect_error){
	echo "<br>";
	echo "<div align = 'center'>";
	echo "Internal Database Error !";
	echo "</div>";
}
else{
	$sql = "insert into reg values('$name', '$email', '$password')";
	$res = $conn->query($sql);
	if($res===TRUE){

		echo '<script>window.alert("Registered Successfully!")</script>';
		echo "<script>setTimeout(function(){window.location.href='login.html'},100);</script>";
		}

	else{
		echo '<script>window.alert("Error Occured Try Again!")</script>';
		echo "<script>setTimeout(function(){window.location.href='signup.html'},100);</script>";
	}

}
$conn->close();
 ?>
