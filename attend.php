<?php
session_start();
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
  $sql = "SELECT attendance FROM reg";
	$result = $conn->query($sql);
		if ($result->num_rows > 0) {
    echo "<table><tr><th>NAME</th><th>NO.OF.PRESENT</th></tr><hr>";
		while($row = $result->fetch_assoc()) {
		 echo "<tr><td>" . $row["name"]. "</td><td>" . $row["attend"]. "</td></tr>";
 }
       echo "</table>";
		 }
   else {
     echo "The employee have no details to display";
   }
	 echo "<button type="button" onclick='index.html'>"EXIT"</button>";

$conn->close();

 ?>
