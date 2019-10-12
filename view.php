<?php
session_start();
$email = $_SESSION['email'];
$password = $_SESSION['password'];


$serv = "localhost";
$user = "root";
$pass = "";
$db = "vote";

$conn = new mysqli($serv,$user,$pass,$db);

if($conn->connect_error){
	echo "<br>";
	echo "<div align = 'center'>";
	echo "Internal Database Error !";
	echo "</div>";
}
else{
  $sql = "SELECT name, email, password , attend from reg where email = '$email' and password = '$password'";
	$res = $conn->query($sql);
  if($res===TRUE){
    echo "<table><tr><th>Employee Details</th></tr><hr>";
       echo "<tr><td>Name : </td><td>".$row["name"]."</td></tr>";
       echo "<tr><td>Email :</td><td>".$row["email"]."</td></tr>";
       echo "<tr><td>Password : </td><td>".$row["password"]."</td></tr>";
       echo "<tr><td>No.Of.Hours present :</td><td>".$row["attend"]."</td></tr>";
       echo "</table>";
   }
   else {
     echo "You have no details to display";
   }
 }

 echo "<button type="button" onclick='index.html'>"EXIT"</button>";

$conn->close();
    ?>
