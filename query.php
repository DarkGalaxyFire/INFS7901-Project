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
	}
	tr {
		color: ;
	}
	tr:nth-child(even) {
		background-color: #1f2325;
	}
	tr:nth-child(odd) {
		background-color: #191d20;
	}
	td {
		color: #e0e0e0;
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
	/* Entire body of webpage */
	.webpage-body {
		display: block;
		width: 100%;
		padding-top: 70px;
	}
</style>
</head>

<body>
<!-- TOP COVER -->
<div class='title'>
	<h3 class='header'>INFS 7901 Project</h3>
	<h2 class='subheader'>Database Principles</h2>
</div>
<img class='poster' src="elder-drake.png">
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
		<a href='diagram.php' title='Dispaly ER Diagram'>Diagram</a>
	</div>
</div>
<!-- WEBPAGE BODY -->
<div class='webpage-body'>
	<a href="index.php"><button>Return to index.php</button></a><br>
<?php
	################################################################################
	# Delete on cascade account                                                    #
	################################################################################

	if (!empty($_REQUEST["delete"])) {
		$delete = $_REQUEST["delete"];
		$_REQUEST["query"] = 2;
		echo "Account will be deleted: ", $delete, "<br>\n";
	} else {
		$delete = "Puffy Snowflakes";
	}

	################################################################################
	# Update by adding points                                                      #
	################################################################################

	if (!empty($_REQUEST["amount"])) {
		$amount = $_REQUEST["amount"];
		$gameName = $_REQUEST["gameName"];

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

		// run update
		$update = "
			UPDATE Accounts
			SET balanceRiot = balanceRiot + $amount
			WHERE gameName = '$gameName';
		";
		$result = $conn->query($update);
		if (!$result) {
			echo "Error: $conn->error<br>\n";
		}

		// run select query
		$select = "
			SELECT * FROM Accounts;
		";
		$result = $conn->query($select);
		if (!$result) {
			echo "Error: $conn->error<br>\n";
		}

		// print table of accounts
		if ($conn->query($select)) {
			echo "<table>\n\t
				<tr>
					<td>Game Name</td>   <td>Riot Point Balance</td>
					<td>Rank</td>   <td>serverID</td>
				</tr>
			\n";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "\t
				<tr>
					<td>{$row["gameName"]}</td>   <td>{$row["balanceRiot"]}</td>
					<td>{$row["seasonRank"]}</td>   <td>{$row["serverID"]}</td>
				</tr>\n
				";
			}
			echo "</table><br><br>\n";
		} else {
			echo "Select Query failed<br>\n";
		}
	}

	################################################################################
	# Update by purchase skin                                                      #
	################################################################################

	if (!empty($_REQUEST["account"]) and !empty($_REQUEST["hero"]) and !empty($_REQUEST["theme"])) {
		$account = $_REQUEST["account"];
		$hero = $_REQUEST["hero"];
		$theme = $_REQUEST["theme"];
		echo "Account name: (", $account, ") wants to buy (", $theme, " ", $hero, ") skin<br>\n";

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

		// display Owns table before purchase
		$select = "
			SELECT gameName, heroName, theme, rarity
			FROM Owns
			JOIN Skins
			ON Owns.productID = Skins.productID
			WHERE gameName = '$account';
		";
		$result = $conn->query($select);
		if (!$result) {
			echo "Error: $conn->error<br>\n";
		}
		echo "<table>\n\t
			<tr>
				<td>Game Name</td>   <td>Hero Name</td>
				<td>Theme</td>   <td>Rarity</td>
			</tr>
		\n";
		while ($row = mysqli_fetch_assoc($result)) {
			echo "\t
			<tr>
				<td>{$row["gameName"]}</td>   <td>{$row["heroName"]}</td>
				<td>{$row["theme"]}</td>   <td>{$row["rarity"]}</td>
			</tr>\n
			";
		}
		echo "</table><br>\n";

		// find skin cost
		$amount = mysqli_fetch_assoc($conn->query("
			SELECT price
			FROM Skins
			JOIN Products
			ON Skins.productID = Products.ID
			WHERE heroName = '$hero'
			AND theme = '$theme';
		"));
		if (!$amount) {
			echo "Error: $conn->error<br>\n";
		}

		// find product ID
		$productID = mysqli_fetch_assoc($conn->query("
			SELECT productID
			FROM Skins
			JOIN Products
			ON Skins.productID = Products.ID
			WHERE heroName = '$hero'
			AND theme = '$theme';
		"));
		if (!$amount) {
			echo "Error: $conn->error<br>\n";
		}

		// find account balance
		$balance = mysqli_fetch_assoc($conn->query("
			SELECT balanceRiot
			FROM Accounts
			WHERE gameName = '$account';
		"));
		if (!$balance) {
			echo "Error: $conn->error<br>\n";
		}
		echo "Your account balance is: ", $balance["balanceRiot"], "<br>\n";
		echo "The skin cost is : ", $amount["price"], "<br><br>\n";

		// if have points to purchase skin then
		if ($balance["balanceRiot"] >= $amount["price"]) {
			// decrease account balance
			$result = $conn->query("
				UPDATE Accounts
				SET balanceRiot = balanceRiot - {$amount["price"]}
				WHERE gameName = '$account';
			");
			if (!$result) {
				echo "Error: $conn->error<br>\n";
			}

			// add skin to account
			$result = $conn->query("
				INSERT INTO Owns
				VALUES ('$account', {$productID["productID"]}, TIMESTAMP '2018-05-30 18:00:00');
			");
			if (!$result) {
				echo "Error: $conn->error<br>\n";
			} else {
				echo "Purchase was successful! <br>\n";
				// find account balance again
				$balance = mysqli_fetch_assoc($conn->query("
					SELECT balanceRiot
					FROM Accounts
					WHERE gameName = '$account';
				"));
				if (!$balance) {
					echo "Error: $conn->error<br>\n";
				}
				echo "Your new account balance is: ", $balance["balanceRiot"], "<br>\n";
			}
		} else {
			echo "Not enough points to buy skin!<br>\n";
		}

		// display Owns table again
		$select = "
			SELECT gameName, heroName, theme, rarity
			FROM Owns
			JOIN Skins
			ON Owns.productID = Skins.productID
			WHERE gameName = '$account';
		";
		$result = $conn->query($select);
		if (!$result) {
			echo "Error: $conn->error<br>\n";
		}
		echo "<table>\n\t
			<tr>
				<td>Game Name</td>   <td>Hero Name</td>
				<td>Theme</td>   <td>Rarity</td>
			</tr>
		\n";
		while ($row = mysqli_fetch_assoc($result)) {
			echo "\t
			<tr>
				<td>{$row["gameName"]}</td>   <td>{$row["heroName"]}</td>
				<td>{$row["theme"]}</td>   <td>{$row["rarity"]}</td>
			</tr>\n
			";
		}
		echo "</table><br><br>\n";
	} 

	################################################################################
	# Define which query runs                                                      #
	################################################################################
	if (!empty($_GET["link"])) {
		$num = $_GET["link"];
	} elseif (!empty($_REQUEST["query"])) {
		$num = $_REQUEST["query"];
	} else {
		echo "No query selected";
	}

	if ($num) {
		echo "**************************************************<br>\n";
		echo "Your query number was: ", $num, "<br>\n";

		##################################################

		if ($num == 1) {
			$create = "
				CREATE VIEW HighRank AS
				    /* return players and their region */
				    SELECT gameName, seasonRank, region, city
				    FROM Servers, Accounts
				    WHERE Servers.id = Accounts.serverId
				    /* if player has a high rank */
				    AND seasonRank > 20;

				CREATE VIEW BestRegion AS
				    /* return region and number of high ranked players in each region */
				    SELECT region, count(region) AS goodPlayers
				    FROM HighRank
				    GROUP BY region;
			";
			$select = "
				SELECT * FROM BestRegion;
			";
			$drop = "
				DROP VIEW BestRegion;
				DROP VIEW HighRank;
			";
		}

		##################################################

		elseif ($num == 2) {
			$create = "
				DELETE FROM Accounts
				WHERE gameName = '$delete';
			";
			$select = "
				SELECT * FROM Accounts;
			";
			$drop = "";
		}

		##################################################

		elseif ($num == 3) {
			$create = "
				UPDATE Accounts
				/* decrease all players' ranks by 20% and subtract 4
				 * so all players' ranks will go down by a lot since max rank is 27 */
				SET seasonRank = FLOOR(seasonRank * 0.80 - 4);

				UPDATE Accounts
				/* if player rank is negative then set it to one */
				SET seasonRank = 1
				WHERE seasonRank <= 0;
			";
			$select = "
				SELECT gameName, seasonRank FROM Accounts;
			";
			$drop = "";
		}

		##################################################

		elseif ($num == 4) {
			$create = "
				CREATE VIEW numberSkins AS
				    /* return the name of hero, number of skins that hero has */
				    SELECT name AS HeroName, count(name) AS NumberOfSkins
				    FROM heroes
				    JOIN skins
				    ON heroes.name = skins.heroname
				    /* group by each hero */
				    GROUP BY name
				    ORDER BY name;
			";
			$select = "
				SELECT * FROM NumberSkins;
			";
			$drop = "
				DROP VIEW NumberSkins;
			";
		}

		##################################################

		elseif ($num == 5) {
			$create = "
				CREATE VIEW MaxPrice AS
				    /* return the price of the most expensive skin */
				    SELECT heroName, max(price) AS maxPrice
				    /* get table of hero skin information */
				    FROM products
				    JOIN skins
				    ON products.Id = skins.productId
				    /* group into categories of each hero */
				    GROUP BY heroName;

				CREATE VIEW ProductsSkins AS
				    /* to store results of join on products and skins tables */
				    SELECT *
				    FROM products, skins
				    WHERE products.Id = skins.productId;

				CREATE VIEW MaxPriceSkin AS
				    /* return each skin found and the details about each skin */
				    SELECT ProductsSkins.heroName, theme, rarity, price
				    /* get table of hero skin info and most expensive skin info */
				    FROM ProductsSkins, MaxPrice
				    /* for each hero */
				    WHERE MaxPrice.heroName = ProductsSkins.heroName
				    /* find the skins whose price equals the price of the most expensive skin that each hero owns */
				    AND MaxPrice.maxPrice = ProductsSkins.price;
			";
			$select = "
				SELECT * FROM MaxPriceSkin;
			";
			$drop = "
				DROP VIEW MaxPrice;
				DROP VIEW ProductsSkins;
				DROP VIEW MaxPriceSkin;
			";
		}

		##################################################

		elseif ($num == 6) {
			$create = "
				CREATE VIEW ProductsOwns AS
				    SELECT *
				    /* get table of products that each account owns */
				    FROM products
				    JOIN owns
				    ON products.id = owns.productId;

				CREATE VIEW SpendHistory AS
				    /* get the account name, total spend amount, number of purchases */
				    SELECT gameName, sum(price) AS totalSpending, count(price) AS numPurchases
				    FROM ProductsOwns
				    /* for game items that must be bought with real money */
				    WHERE price > 0
				    GROUP BY gameName;
			";
			$select = "
				SELECT * FROM SpendHistory;
			";
			$drop = "
				DROP VIEW ProductsOwns;
				DROP VIEW SpendHistory;
			";
		}

		##################################################

		elseif ($num == 7) {
			$create = "
				CREATE VIEW NotOwn AS
				    SELECT DISTINCT player.gameName, Heroes.name AS heroName
				    FROM Heroes, Owns player
				    /* get heroes player does not own*/
				    WHERE Heroes.name NOT IN (
				        /* get the heroes player owns */
				        SELECT Heroes.name
				        FROM Owns
				        JOIN Heroes
				        ON Heroes.productId = Owns.productId
				        /* for each player */
				        WHERE player.gameName = Owns.gameName
				    );

				CREATE VIEW OwnsAll AS
				    /* return the name of the player */
				    SELECT DISTINCT player.gameName
				    FROM Owns player
				    /* if the list of heroes is empty */
				    WHERE NOT EXISTS (
				        /* get all the heroes a player does not own */
				        SELECT heroName
				        FROM NotOwn
				        /* for each player */
				        WHERE player.gameName = NotOwn.gameName
				    );
			";
			$select = "
				SELECT * FROM OwnsAll;
			";
			$drop = "
				DROP VIEW NotOwn;
				DROP VIEW OwnsAll;
			";
		}

		##################################################

		elseif ($num == 8) {
			$create = "
				CREATE VIEW ProductsOwns AS
				    SELECT *
				    /* get table of products that each account owns */
				    FROM products
				    JOIN owns
				    ON products.id = owns.productId;

				CREATE VIEW AveragePurchase AS
				    SELECT gameName, AVG(price) AS averagePrice
				    FROM ProductsOwns
				    /* get players whose average price of all things they bought
				     * is higher than the game's average */
				    GROUP BY gameName
				    HAVING AVG(price) >(
				        /* return average price of all products in the entire game */
				        SELECT AVG(price) 
				        FROM ProductsOwns
				    );
			";
			$select = "
				SELECT * FROM AveragePurchase;
			";
			$drop = "
				DROP VIEW ProductsOwns;
				DROP VIEW AveragePurchase;
			";
		}

		##################################################

		elseif ($num == 9) {
			$create = "
				CREATE VIEW ProductsOwns AS
					SELECT *
					/* get table of products that each account owns */
					FROM products
					JOIN owns
					ON products.Id = owns.productId;

				CREATE VIEW PriceFilter AS
					/* return the average price of items bought for each player */
					SELECT gameName, MIN(price) AS minPrice
					FROM ProductsOwns
					/* get players who have bought more than 7 products */
					GROUP BY gameName
					HAVING 7 < count(price);
			";
			$select = "
				SELECT * FROM PriceFilter;
			";
			$drop = "
				DROP VIEW ProductsOwns;
				DROP VIEW PriceFilter;
			";
		}

		##################################################
		elseif ($num == 10) {
			$create = "
				CREATE VIEW OwnsSkins AS
				    /* return useful results of join between Owns and Skins */
				    SELECT gameName, heroName, theme, rarity
				    FROM Owns
				    JOIN Skins
				    ON Owns.productId = Skins.productId
				    ORDER BY gameName;

				CREATE VIEW ManySkins AS
				    /* return players who own lots of skins */
				    SELECT gameName, count(gameName) AS numSkins
				    FROM OwnsSkins
				    GROUP BY gameName
				    HAVING count(gameName) >= 4;

				CREATE VIEW SkinsNotOwned AS
				    SELECT gameName, heroName, theme, rarity
				    FROM Accounts, Skins
				    /* find skins not owned by that player */
				    WHERE Skins.theme NOT IN (
				        SELECT theme
				        FROM OwnsSkins 
				        /* for each gameName */
				        WHERE Accounts.gameName = OwnsSkins.gameName
				        /* for each hero */
				        AND Skins.heroName = OwnsSkins.heroName    
				    ) /* players who have many skins */
				    AND Accounts.gameName IN (
				        SELECT gameName
				        FROM ManySkins
				    )
				    ORDER BY gameName, heroName;
			";
			$select = "
				SELECT * FROM SkinsNotOwned;
			";
			$drop = "
				DROP VIEW OwnsSkins;
				DROP VIEW ManySkins;
				DROP VIEW SkinsNotOwned;
			";
		}

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

		// Print all queries to run
		echo "**************************************************<br>\n";
		echo "Create query was: $create<br>\n";
		echo "Select query was: $select<br>\n";
		echo "Drop query was: $drop<br>\n";
		echo "**************************************************<br><br>\n";

		################################################################################
		# Create query                                                                 #
		################################################################################

		// Create views
		if ($conn->multi_query($create)) {
			echo "Create executed successfully<br><br>\n";
		} else {
			echo "Error during creation: " . $conn->error . "<br><br>\n";
		}
		echo "**************************************************<br><br>\n";


		// flush multi_queries so that can use single query function
		while ($conn->next_result()) {;}
		
		################################################################################
		# Select query                                                                 #
		################################################################################

		// Select query
		$result = $conn->query($select);
		if (!$result) {
			echo "Error: $conn->error<br>\n";
		}
		##################################################

		// Query 1
		if ($result->num_rows > 0 and $num == 1) {
			echo "<table>\n\t
				<tr>
					<th>Region</th>   <th>Good Players</th>
				</tr>
			\n";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "\t
				<tr>
					<td>{$row["region"]}</td>   <td>{$row["goodPlayers"]}</td>
				</tr>\n
				";
			}
			echo "</table><br><br>\n";
		##################################################
		// Query 2 
		} elseif ($result->num_rows > 0 and $num == 2) {
			echo "<table>\n\t
				<tr>
					<th>Game Name</th>   <th>Riot Point Balance</th>
					<th>Rank</th>   <th>serverID</th>
				</tr>
			\n";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "\t
				<tr>
					<td>{$row["gameName"]}</td>   <td>{$row["balanceRiot"]}</td>
					<td>{$row["seasonRank"]}</td>   <td>{$row["serverID"]}</td>
				</tr>\n
				";
			}
			echo "</table><br><br>\n";
		##################################################
		// Query 3
		} elseif ($result->num_rows > 0 and $num == 3) {
			echo "<table>\n\t
				<tr>
					<th>Game Name</th>   <th>Rank</th>
				</tr>
			\n";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "\t
				<tr>
					<td>{$row["gameName"]}</td>   <td>{$row["seasonRank"]}</td>
				</tr>\n
				";
			}
			echo "</table><br><br>\n";
		##################################################
		// Query 4
		} elseif ($result->num_rows > 0 and $num == 4) {
			echo "<table>\n\t
				<tr>
					<th>Hero Name</th>   <th>Number of Skins</th>
				</tr>
			\n";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "\t
				<tr>
					<td>{$row["HeroName"]}</td>   <td>{$row["NumberOfSkins"]}</td>
				</tr>\n
				";
			}
			echo "</table><br><br>\n";
		##################################################
		// Query 5
		} elseif ($result->num_rows > 0 and $num == 5) {
			echo "<table>\n\t
				<tr>
					<th>Hero Name</th>   <th>Skin Theme</th>
					<th>Skin Rarity</th>   <th>Skin Price</th>
				</tr>
			\n";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "\t
				<tr>
					<td>{$row["heroName"]}</td>   <td>{$row["theme"]}</td>
					<td>{$row["rarity"]}</td>   <td>{$row["price"]}</td>
				</tr>\n
				";
			}
			echo "</table><br><br>\n";
		##################################################
		// Query 6
		} elseif ($result->num_rows > 0 and $num == 6) {
			echo "<table>\n\t
				<tr>
					<th>Game Name</th>   <th>Total Spending</th>
					<th>Number of Purchases</th>
				</tr>
			\n";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "\t
				<tr>
					<td>{$row["gameName"]}</td>   <td>{$row["totalSpending"]}</td>
					<td>{$row["numPurchases"]}</td>
				</tr>\n
				";
			}
			echo "</table><br><br>\n";
		##################################################
		// Query 7
		} elseif ($result->num_rows > 0 and $num == 7) {
			echo "<table>\n\t
				<tr>
					<th>Game Name</th>
				</tr>
			\n";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "\t
				<tr>
					<td>{$row["gameName"]}</td>
				</tr>\n
				";
			}
			echo "</table><br><br>\n";
		##################################################
		// Query 8
		} elseif ($result->num_rows > 0 and $num == 8) {
			echo "<table>\n\t
				<tr>
					<th>Game Name</th>   <th>Average Purchase Amount</th>
				</tr>
			\n";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "\t
				<tr>
					<td>{$row["gameName"]}</td>   <td>{$row["averagePrice"]}</td>
				</tr>\n
				";
			}
			echo "</table><br><br>\n";
		##################################################
		// Query 9
		} elseif ($result->num_rows > 0 and $num == 9) {
			echo "<table>\n\t
				<tr>
					<th>Game Name</th>   <th>Minimum Purchase Amount</th>
				</tr>
			\n";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "\t
				<tr>
					<td>{$row["gameName"]}</td>   <td>{$row["minPrice"]}</td>
				</tr>\n
				";
			}
			echo "</table><br><br>\n";
		##################################################
		// Query 10
		} elseif ($result->num_rows > 0 and $num == 10) {
			echo "<table>\n\t
				<tr>
					<th>Game Name</td>   <th>Hero Name</th>
					<th>Theme</td>   <th>Rarity</th>
				</tr>
			\n";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "\t
				<tr>
					<td>{$row["gameName"]}</td>   <td>{$row["heroName"]}</td>
					<td>{$row["theme"]}</td>   <td>{$row["rarity"]}</td>
				</tr>\n
				";
			}
			echo "</table><br>\n";
		} else {
			echo "No results returned<br><br>\n";
		}

		echo "**************************************************<br><br>\n";

		################################################################################
		# Drop query                                                                   #
		################################################################################

		// flush multi_queries so that can use single query function
		while ($conn->next_result()) {;}

		// Drop tables
		if (empty($drop)) {
			echo "Drop query was empty";
		} elseif ($conn->multi_query($drop)) {
			echo "Drop executed successfully<br>\n";
		} else {
			echo "Error during drop views<br>\n";
		}

		// Close connection
		$conn->close();

		################################################################################
	}
?>
</div>
</body>
</html>