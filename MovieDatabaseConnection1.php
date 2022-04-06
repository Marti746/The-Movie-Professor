<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
$servername = "localhost";
$username = "beccafri_themovieprofessor";
$password = 'GN42XnlsZYdG';
$dbname = "beccafri_movies";
echo "$servername $username $password $dbname";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}	
	
$sql = "select * from movies";
$result = $conn->query($sql);	

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Actors: " . $row["actors"]. " - Genre: " . $row["genre"]. " " . $row["movieName"]. "<br>";
  }
} else {
  echo "0 results Yikes!";
}
$conn->close();	
	?>
</body>
</html>
