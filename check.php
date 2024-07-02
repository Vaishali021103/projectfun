<?php


// CREATE CONNECTION
$conn = mysqli_connect("localhost","root","","interntask","3309");

// GET CONNECTION ERRORS
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// SQL QUERY
$query = "SELECT * FROM `stud`;";

// FETCHING DATA FROM DATABASE
$result = $conn->query($query);

	if ($result->num_rows > 0)
	{
		// OUTPUT DATA OF EACH ROW
		while($row = $result->fetch_assoc())
		{
			echo "email: " .
				$row["email"]. " | username: " .
				$row["username"]. " | password: " .
				$row["password"]. " <br> " ;	
		}
	}
	else {
		echo "0 results";
	}

$conn->close();

?>
