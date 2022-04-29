<!doctype html>

<html>

<head>
    <meta charset="utf-8">

    <title>Movie List</title>

    <!-- Title on the actual Splash page of the website in bold -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- External Style Sheet -->
    <link rel="stylesheet" href="buttonStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <!-- Movie Professor Logo -->
    <img src="movieProf.png" height="120" alt="Movie prof logo">

    <!-- Nav bar on the top with each section labeled -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="true">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Buttons are ajax nav bar to link to each seperate page-->
    <div id="navb" class="navbar-collapse collapse hide">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="Updated.html">Home</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="MovieList.php">Movies</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="About.html">About</a>
        </li>
        </ul>

        <!-- Nav bar log in and sign up sections-->
        <ul class="nav navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="LogIn.php"><span class="fas fa-user"></span> Sign Up</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="LogIn.php"><span class="fas fa-sign-in-alt"></span> Login</a>
        </li>
        </ul>

    </div>
    </nav>
</head>

<!-- Database connection -->
<body style="background-color:AliceBlue;">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validation();"
        name="search-form">
        <table cellpadding="0" cellspacing="0" border="0" class="form">
            <tr>
                <!-- Displays the table information on the webpage -->
                <label for="searchType">Select What Category You Want to Search: </label>
                <select name="searchType" id="searchType">
                    <option value="Select" selected="selected">Please select</option>
                    <option value="Title">Title</option>
                    <option value="Genre">Genre</option>
                    <option value="Rating">Rating</option>
                    <option value="Actor">Actor</option>
                    <option value="Watchsite">Watchsite</option>
                </select>
                <td><input type="text" class="text" name="searchTerm" id="searchTerm" /></td>
            </tr>
            <tr>
                <td><input type="submit" class="submit" value="Submit" /></td>
            </tr>
        </table>
    </form>
    <!-- PHP query for going out and retrieving the data from the table -->
    <?php
 $searchType = $_POST['searchType'];
 $searchTerm = $_POST['searchTerm'];
 $servername = "localhost";
 $username = "beccafri_themovieprofessor";
 $password = 'GN42XnlsZYdG';
 $dbname = "beccafri_movies";
 if ($searchType != ""){
	  // echo "$accountType Account Type";		
	}
	else {
    // echo "$accountType No Account Type";	
	}

 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Narrows the query using the title search
if ($searchType=="Title") {
  $sql = "select * from movies where movieName like '%$searchTerm%' order by movieName";
} else if ($searchType=="Genre") {
  $sql = "select * from movies where genre='$searchTerm' order by movieName";
} else if ($searchType=="Rating") {
  $sql = "select * from movies where rating='$searchTerm' order by movieName";
} else if ($searchType=="Actor") {
  $sql = "select * from movies where actors like '%$searchTerm%' order by movieName";
} else if ($searchType=="Watchsite") {
  $sql = "select * from movies where watchsites like '%$searchTerm%' order by movieName";
} else {
  $sql = "select * from movies order by movieName";
}

// Output of the data using the results 
$result = $conn->query($sql);	
if ($result->num_rows > 0) {
  // output data of each row
echo '<table cellpadding="1" cellspacing="0" border="1"><tr><td>Title</td><td>Genre</td><td>Rating</td><td>Synopsis</td><td>Lead Actors</td><td>Watchsites</td></tr>';
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["movieName"]. "</td><td>" . $row["genre"]. "</td><td>" . $row["rating"]. "</td><td>" . $row["synopsis"]. "</td><td>" . $row["actors"]. "</td><td>" . $row["watchsites"]. "</tr>";
  }
echo "</table>";
} else {
  echo "0 results Yikes!";
}


$conn->close();	
	?>




</body>

</html>