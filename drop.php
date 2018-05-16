<!DOCTYPE html>
<html>
<head>
	<title>Drop Tables SQL</title>
</head>
<body>
	<a href="index.php"><button>Return to index.php</button></a><br>
<?php
	################################################################################

	// Database information
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    exit("Connection failed: " . $conn->connect_error);
	}

	################################################################################

	// display user entered text
	echo "You entered: ", $_POST["drop"], "<br><br>";

	// Drop tables to reset database
	$sql = "
DROP TABLE IF EXISTS `MatchHistory`, `Accounts`, `Heroes`, `Owns`, `Products`, `Servers`, `Skins` CASCADE;
";
	################################################################################
	# Execute the SQL query                                                        #
	################################################################################

	// split entire SQL into individual queries
	$arr = explode(";", $sql);
	foreach ($arr as $query) {
		// print each query
		echo $query, ";<br>";
	}
	echo "<br>";

	// for debugging
	if ($conn->multi_query($sql) === TRUE) {
	    echo "<br>SQL query executed successfully";
	} else {
	    echo "<br>Error: " . $sql . "<br><br>" . $conn->error;
	}

	################################################################################
?>
</body>
</html>