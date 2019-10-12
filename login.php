<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $email = $_POST["email"];
  $password = $_POST['password'];
  $attend=$_POST['attend'];
}

$server = 'localhost';
$user = 'root';
$pass = "";
$db = 'employee';

$conn = new mysqli($server,$user,$pass,$db);

if($conn->connect_error){
  die("connection failed: ".$conn->connect_error);
}
else{
$sql="SELECT name,email,password,attend from reg where email='$email' and password = '$password'";
$result=$conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      if($email==$row['email'] && $password == $row['password']){
				$_SESSION['name'] = $row['name'];
				$_SESSION['email'] = $row['email'];
        echo '<script>window.alert("Welcome back '.$row["name"].'!")</script>';
        if($attend=='present'){
          $sql1="UPDATE reg set present=present+1 where email='$email'";
          if ($conn->query($sql1)===TRUE){
          			echo '<script>window.alert("Attendance added Successfully!")</script>';
          	}
          }
        echo "<script>setTimeout(function(){window.location.href='home.html'},100);</script>";
    }
  }
}
else{
		echo '<script>window.alert("Login Error!")</script>';
		echo "<script>setTimeout(function(){window.location.href='login.html'},100);</script>";
	}
}

$conn->close();
 ?>
