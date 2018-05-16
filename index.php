<!DOCTYPE html>
<html>

<head>
	<title>Hello World Webpage where Cute Kittens Reign Supreme!</title>
	<style>
		table, th, td {
		    border: 1px solid black;
		    border-collapse: collapse;
		}
	</style>
</head>

<body>

<form action="drop.php" method="post">
	Drop All Tables:&nbsp;<input name="drop" type="text"><input value="Delete Database" type="submit">
</form>

<form action="create.php" method="post">
	Create All Tables:&nbsp;<input name="create" type="text"><input value="Create Database" type="submit">
</form>
<br>

<form action="query.php" method="post">
	Query number (8 is avg nested aggregate, 9 is min, 10 is division):&nbsp;<input name="query" type="text"><input value="Query" type="submit"><br>
</form><br>

<form action="query.php" method="post">
	Purchase with account name:&nbsp;<input name="account" type="text">Skin theme:&nbsp;<input name="theme" type="text">Hero name:&nbsp;<input name="hero" type="text"><input value="Purchase" type="submit"><br>

	Add points:&nbsp;<input name="amount" type="text">Account name:&nbsp;<input name="gameName" type="text"><input value="Add Points" type="submit"><br>

	Delete which account:&nbsp;<input name="delete" type="text"><input value="Delete Account" type="submit"><br>
</form><br>

er diagram<br>
report<br><br>

<?php
	################################################################################
	# Connect to database                                                          #
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
	# Display all tables                                                           #
	################################################################################

	$result = $conn->query("SELECT * FROM Servers;");

	// Table header
	echo "Servers";
	echo "<table>\n\t
		<tr>
			<td>ID</td>   <td>City</td>
			<td>Region</td>
		</tr>
	\n";

	// Table body
	while($row = mysqli_fetch_assoc($result)) {
		echo "\t
		<tr>
			<td>{$row["id"]}</td>   <td>{$row["city"]}</td>
			<td>{$row["region"]}</td>
		</tr>\n
		";
	}
	echo "</table><br>\n";

	################################################################################

	$result = $conn->query("SELECT * FROM Accounts ORDER BY gameName;");

	// Table header
	echo "Accounts";
	echo "<table>\n\t
		<tr>
			<td>Game Name</td>   <td>Password</td>   <td>BE Balance</td>
			<td>Riot Point Balance</td>   <td>Rank</td>   <td>Server Id</td>
		</tr>
	\n";

	// Table body
	while($row = mysqli_fetch_assoc($result)) {
		echo "\t
		<tr>
			<td>{$row["gameName"]}</td>   <td>{$row["password"]}</td>
			<td>{$row["balanceBlue"]}</td>   <td>{$row["balanceRiot"]}</td>
			<td>{$row["seasonRank"]}</td>   <td>{$row["serverID"]}</td>
		</tr>\n
		";
	}
	echo "</table><br>\n";

	################################################################################

	$result = $conn->query("SELECT * FROM Products;");

	// Table header
	echo "Products";
	echo "<table>\n\t
		<tr>
			<td>ID</td>   <td>Price</td>
		</tr>
	\n";

	// Table body
	while($row = mysqli_fetch_assoc($result)) {
		echo "\t
		<tr>
			<td>{$row["id"]}</td>   <td>{$row["price"]}</td>
		</tr>\n
		";
	}
	echo "</table><br>\n";

	################################################################################

	$result = $conn->query("SELECT * FROM Owns ORDER BY gameName, productID;");

	// Table header
	echo "Owns";
	echo "<table>\n\t
		<tr>
			<td>Game Name</td>   <td>Product ID</td>
			<td>Purchase Date</td>
		</tr>
	\n";

	// Table body
	while($row = mysqli_fetch_assoc($result)) {
		echo "\t
		<tr>
			<td>{$row["gameName"]}</td>   <td>{$row["productID"]}</td>
			<td>{$row["purchaseDate"]}</td>
		</tr>\n
		";
	}
	echo "</table><br>\n";

	################################################################################

	$result = $conn->query("SELECT * FROM Heroes ORDER BY class, name;");

	// Table header
	echo "Heroes";
	echo "<table>\n\t
		<tr>
			<td>Hero Name</td>   <td>Class</td>
			<td>Product ID</td>
		</tr>
	\n";

	// Table body
	while($row = mysqli_fetch_assoc($result)) {
		echo "\t
		<tr>
			<td>{$row["name"]}</td>   <td>{$row["class"]}</td>
			<td>{$row["productID"]}</td>
		</tr>\n
		";
	}
	echo "</table><br>\n";

	################################################################################

	$result = $conn->query("SELECT * FROM Skins ORDER BY heroName, theme, rarity;");

	// Table header
	echo "Skins";
	echo "<table>\n\t
		<tr>
			<td>Product ID</td>   <td>Hero Name</td>
			<td>Skin Theme</td>   <td>Rarity</td>
		</tr>
	\n";

	// Table body
	while($row = mysqli_fetch_assoc($result)) {
		echo "\t
		<tr>
			<td>{$row["productID"]}</td>   <td>{$row["heroName"]}</td>
			<td>{$row["theme"]}</td>   <td>{$row["rarity"]}</td>
		</tr>\n
		";
	}
	echo "</table><br>\n";

	################################################################################

	$result = $conn->query("SELECT * FROM MatchHistory ORDER BY gameName, heroName;");

	// Table header
	echo "MatchHistory";
	echo "<table>\n\t
		<tr>
			<td>Game Name</td>   <td>Start Time</td>
			<td>End Time</td>   <td>Result</td>
			<td>Party Size</td>   <td>Position</td>
			<td>Hero Name</td>   <td>Skin Theme</td>
		</tr>
	\n";

	// Table body
	while($row = mysqli_fetch_assoc($result)) {
		echo "\t
		<tr>
			<td>{$row["gameName"]}</td>   <td>{$row["startTimestamp"]}</td>
			<td>{$row["endTimestamp"]}</td>   <td>{$row["result"]}</td>
			<td>{$row["partySize"]}</td>   <td>{$row["position"]}</td>
			<td>{$row["heroName"]}</td>   <td>{$row["skinTheme"]}</td>
		</tr>\n
		";
	}
	echo "</table><br>\n";

	################################################################################
	/*
	// define a constant
	define("GREETING", "A global constant, like Pi or the speed of light<br><br>");
	echo GREETING;

	// supports object oriented programming
	class Message {
		// constructor method
		function Message() {
			$this->text = "Text that this message object contains<br><br>";
		}
	}
	// instantiate an object
	$message = null;
	$message = new Message();
	// print object field
	echo $message->text;

	// variables
	$text = "Hello world! ";
	$declare = "This is my webpage!</br>";

	// print and string concatentation
	echo $text . $declare;
	echo $text, $declare, "<br>";

	// math
	echo "Simple maths: ", "1 + 1 = ", 1+1, "<br>Just as 2**5 = ", 2**5, "<br><br>";

	// basic string functions
	$length = strlen($text);
	$words = str_word_count($text);
	$position = strpos($text, "world");
	$string = "String properties: $length $words $position";
	echo "Regular string: ", $string, "<br>";
	echo "Reversed string: ", strrev($string), "<br>";
	echo "Replaced string: ", str_replace("world", "planet Earth", $text), "<br><br>";

	// array and for each loop
	$arr = array("This ", "is ", "an ", "array");
	echo "This is a for each loop<br>";
	foreach ($arr as $word) {
		echo $word;
	}
	echo "<br><br>";

	// for loop
	echo "This is a for loop<br>";
	for ($i=0; $i<5; $i++) {
		echo "i equals $i<br>";
	}
	echo "<br>";

	// while loop
	$i = 0;
	echo "This is a while loop<br>";
	while ($i < 5) {
		echo "i equals $i<br>";
		$i++;
	}
	echo "<br>";

	// if statement and logical operators syntax from multiple languages
	if (1 != 0 || 5 == 5 and True or !False xor False && True) {
		echo "This if statement is True<br>";
	} elseif (True) {
		echo "This elseif statement is True<br>";
	} else {
		echo "This else statement is True<br>";
	}
	*/
	################################################################################
?>

</body>
</html>