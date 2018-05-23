<!DOCTYPE html>
<html>
<head>
<title>Project - Home</title>
<style>
	/* Reset box model */
	html {
		box-sizing: border-box;
	}
	*, *:before, *:after {
		box-sizing: inherit;
	}
	/* Body defaults */
	body {
		font-family: Helvetica, Arial, sans-serif;
		width: 100%;
		height: 100%;
		line-height: 1.42857143;
		font-size: 18px;
		margin: 0;
		padding: 0;
		background-color: #f1f1f1;
		color: #333;
	}
	/* Table styling */
	table {
	    border-collapse: collapse;
	    vertical-align: bottom;
	}
	th {
		background-color: #0d9072;
		color: #fff;
		padding-right: 20px;
		text-align: left;
		white-space: nowrap;
	}
	tr:nth-child(even) {
		background-color: #1f2325;
	}
	tr:nth-child(odd) {
		background-color: #191d20;
	}
	td {
		color: #e0e0e0;
		padding-right: 20px;
	}
	/* Top cover */
	.poster {
		display: block;
		top: 0;
		width: 100%;
	}
	.title {
		position: absolute;
		top: -2%;
		width: 40%;
		left: 30%;
		display: block;
	}
	.header {
		color: #f0e6d2;
		font-size: 40px;
		text-transform: uppercase;
		text-align: center;
		line-height: 0;
		z-index: 100;
	}
	.subheader {
		color: #c8aa6e;
		font-size: 24px;
		text-transform: uppercase;
		text-align: center;
		line-height: 0;
	}
	/* Navigation bar */
	.navbar {
		background-color: #121212;
		border-bottom: 2px solid #262626;
		border-top: 4px solid #836323;
		font-size: 18px;
		font-weight: 700;
		height: 52px;
		line-height: normal;
		position: absolute;
		margin-top: -0.6%;
		text-align: left;
		width: 100%;
		font-size: 100%;
		font: inherit;
		z-index: 1000;
		overflow: hidden;
	}
	.navbar-element {
		display: inline-block;
		float: left;
		margin-top: 10px;
		margin-left: 10%;
	}
	a {
		color: #c9aa71;
		text-decoration: none;
	}
	a:hover {
		color: #f1e6d0;
	}
	a:active {
		color: #fff;
	}
	/* Button */
	.button {
		color: #c8aa6e;
		background-color: #121212;
		border: none;
		font-size: 20px;
		height: 50px;
		width: 180px;
	}
	.button:hover {
		color: #f1e6d0;
		cursor: pointer;
	}
	.button:active {
		color: #fff;
	}
	/* Image */
	.image {
		margin-top: -0.7px;
	}
	/* Hide debugging messages or redundant features */
	.hidden {
		display: none;
	}
	/* ^^^ SHARED AMONG ALL WEBPAGES ^^^ */
	/* Entire body of webpage */
	.webpage-body {
		display: block;
		width: 100%;
		padding-top: 70px;
	}
	.clearfix::before, .clearfix::after {
		content: "";
		clear: both;
		display: table;
	}
	.row {
		position: relative;
		display: block;
		margin-top: -2.5%;
		width: 100%;
		height: 300px;
		clear: both;
	}
	.row-top {
		border-top: 8px solid #c3a568;
    	border-image: linear-gradient(to right,#836323 0,#c3a568 51%,#836323 100%);
	    border-image-slice: 1;
	}
	.float-left {
		position: relative;
		width: 50%;
		float: left;
	}
	.float-right {
		position: relative;
		width: 50%;
		float: right;
	}
	/* First query part */
	.query-select {
		position: absolute;
		top: 65px;
		left: 30px;
		width: 80%;
	}
	.query-text {
		position: absolute;
		font-weight: 700;
		font-size: 20px;
	}
	.dropdown-function {
		position: absolute;
		top: -10px;
		left: 275px;
		width: 180px;
	}
	.dropdown-function:hover > .dropdown-content {
		display: block;
	}
	.dropdown-content {
		background-color: #121212;
		display: none;
		position: absolute;
		padding-left: 10px;
		min-width: 180px;
		font-size: 20px;
		border-top: 2px solid #262626;
		z-index: 10;
	}
	.dropdown-content a {
		color: #c8aa6e;
	    padding: 12px 16px;
	    text-decoration: none;
	    display: block;
	}
	.dropdown-content a:hover {
	    color: #f1e6d0;
	}
	.dropdown-content a:active {
		color: #fff;
	}
	/* Second, Third, and Fourth query part */
	input {
		color: #9b9b9b;
		font-size: 20px;
	}
	.query {
		position: absolute;
		left: 20px;
		top: 20px;
		font-weight: 700;
		width: 400px;
		font-size: 20px;
	}
	.query-1 {
		position: absolute;
		top: 0;
	}
	.query-2 {
		position: absolute;
		top: 30px;
	}
	.query-3 {
		position: absolute;
		top: 70px;
	}
	.query-4 {
		position: absolute;
		top: 100px;
	}
	.query-5 {
		position: absolute;
		top: 140px;
	}
	.query-6 {
		position: absolute;
		top: 170px;
	}
	.query-7 {
		position: absolute;
		top: 210px;
	}
	/* Tables */
	.tables-region {
		width: 100%;
		padding-top: 20px;
		padding-left: 2%;
		clear: both;
	}
	.table-title {
		color: #222;
		font-weight: 700;
	}
</style>
</head>

<body>
<!-- TOP COVER -->
<div class='title'>
	<h3 class='header'>INFS 7901 Project</h3>
	<h2 class='subheader'>Database Principles</h2>
</div>
<img class='poster' src='elder-drake.png'>
<!-- NAVBAR -->
<div class='navbar'>
	<div class='navbar-element'>
		<a href='create.php' title='Instantiate all relations'>Create</a>
	</div>
	<div class='navbar-element'>
		<a href='drop.php' title='Drop all tables in database'>Drop</a>
	</div>
	<div class='navbar-element'>
		<a href='index.php' title='Return to index.php'>Home</a>
	</div>
	<div class='navbar-element'>
		<a href='diagram.php' title='Display ER Diagram'>Diagram</a>
	</div>
</div>
<!-- INTERACTIVE AREA -->
<div class='webpage-body'>
<!-- ROW 1 -->
<div class='row clearfix'>
	<div class='float-left'>
		<div class='query-select'>
			<div class='query-text'>Select Which Query To Run</div>
			<div class='dropdown-function'>
				<button class='button'>Query Number</button>
				<div id='dropdown-query' class='dropdown-content'>
					<a href='query.php?link=1'>Query 1</a>
					<a href='query.php?link=2' name='query2'>Query 2</a>
					<a href='query.php?link=3' name='query3'>Query 3</a>
					<a href='query.php?link=4' name='query4'>Query 4</a>
					<a href='query.php?link=5' name='query5'>Query 5</a>
					<a href='query.php?link=6' name='query6'>Query 6</a>
					<a href='query.php?link=7' name='query7'>Query 7</a>
					<a href='query.php?link=8' name='query8'>Query 8</a>
					<a href='query.php?link=9' name='query9'>Query 9</a>
					<a href='query.php?link=10' name='query10'>Query 10</a>
				</div>
			</div>
		</div>
		<form action="query.php" method="post" class='hidden'>
			Query number (8 is avg nested aggregate, 9 is min, 10 is division):&nbsp;<input name="query" type="text"><input value="Query" type="submit">
		</form>
	</div>
	<img class='image float-right' src='star-guardian.png'>
</div>
<!-- ROW 2 -->
<div class='row clearfix row-top'>
	<div class='float-right'>
		<form class='query' action="query.php" method="post">
			<div class='query-1'>Purchase With Account Name</div>
			<input class='query-2' name="account" type="text" tabindex="1">
			<div class='query-3'>Skin Theme</div>
			<input class='query-4' name="theme" type="text">
			<div class='query-5'>Hero Name</div>
			<input class='query-6' name="hero" type="text">
			<input class='query-7 button' value="Purchase" type="submit">
		</form>
	</div>
	<img class='image float-left' src='project-katarina.png'>
</div>
<!-- ROW 3 -->
<div class='row clearfix row-top'>
	<div class='float-left'>
		<form class='query' action='query.php' method='post'>
			<div class='query-1'>Add Points</div>
			<input class='query-2' name="amount" type="text" tabindex="2">
			<div class='query-3'>Account Name</div>
			<input class='query-4' name="gameName" type="text">
			<input class='query-5 button' value="Add Points" type="submit">
		</form>
	</div>
	<img class='image float-right' src='victorious-sivir.png'>
</div>
<!-- ROW 4 -->
<div class='row clearfix row-top'>
	<img class='image float-left' src='cyberpop-zoe.png'>
	<div class='float-right'>
		<form class='query' action='query.php' method='post'>
			<div class='query-1'>Delete Which Account</div>
			<input class='query-2' name="delete" type="text" tabindex="3">
			<input class='query-3 button' value="Delete Account" type="submit">
		</form>
	</div>
</div>
<!-- STATIC TABLES -->
<div class='tables-region row-top'>
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
	echo "<span class='table-title'>Servers</span>";
	echo "<table>\n\t
		<tr>
			<th>ID</th>   <th>City</th>
			<th>Region</th>
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
	echo "<span class='table-title'>Accounts</span>";
	echo "<table>\n\t
		<tr>
			<th>Game Name</th>   <th>Password</th>   <th>Blue Essence Balance</th>
			<th>Riot Point Balance</th>   <th>Rank</th>   <th>Server Id</th>
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
	echo "<span class='table-title'>Products</span>";
	echo "<table>\n\t
		<tr>
			<th>ID</th>   <th>Price</th>
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
	echo "<span class='table-title'>Owns</span>";
	echo "<table>\n\t
		<tr>
			<th>Game Name</th>   <th>Product ID</th>
			<th>Purchase Date</th>
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
	echo "<span class='table-title'>Heroes</span>";
	echo "<table>\n\t
		<tr>
			<th>Hero Name</th>   <th>Class</th>
			<th>Product ID</th>
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
	echo "<span class='table-title'>Skins</span>";
	echo "<table>\n\t
		<tr>
			<th>Product ID</th>   <th>Hero Name</th>
			<th>Skin Theme</th>   <th>Rarity</th>
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
	echo "<span class='table-title'>Match History</span>";
	echo "<table>\n\t
		<tr>
			<th>Game Name</th>   <th>Start Time</th>
			<th>End Time</th>   <th>Result</th>
			<th>Party Size</th>   <th>Position</th>
			<th>Hero Name</th>   <th>Skin Theme</th>
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
</div> <!-- TABLES END -->
</div> <!-- WEBPAGE END -->

</body>
</html>