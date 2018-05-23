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
		font-size: 18px;
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
</style>
</head>

<body>
<div class='title'>
	<h3 class='header'>INFS 7901 Project</h3>
	<h2 class='subheader'>Database Principles</h2>
</div>
<img class='poster' src="elder-drake.png">

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
		<a href='diagram.php' title='Dispaly ER Diagram'>Diagram</a>
	</div>
</div>

<div class='webpage-body'>
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
</div>
</body>
</html>