<!DOCTYPE html>
<html>
	<head>
		<title>Active Sensors insert</title>
		<meta name="viewport" content="width=device-width">
	</head>
	<body>
		<h1>User Accounts insert</h1>
		<?php
			// Report all PHP errors (see changelog)
			error_reporting(E_ALL);

			if ($_GET['username'] != '' && $_GET['password'] != '' && $_GET['full_name'] != '' && 
				$_GET['address'] != '' && $_GET['user_group'] != '')
			{
				$tab = "\t\t";
				echo "<p><div>" . PHP_EOL;
				$tab2 = "\t\t\t";
				echo $tab2 . "These will be inserted in the data base ..." . "<br>" . PHP_EOL;
				echo $tab2 . "username: " . $_GET['username'] . "<br>" . PHP_EOL;
				echo $tab2 . "password: " . $_GET['password'] . "<br>" . PHP_EOL;
				echo $tab2 . "full_name: " . $_GET['full_name'] . "<br>" . PHP_EOL;
				echo $tab2 . "address: " . $_GET['address'] . "<br>" . PHP_EOL;
				echo $tab2 . "user_group: " . $_GET['user_group'] . "<br>" . PHP_EOL;
				echo $tab . "</div></p>" . PHP_EOL;

				$mysqli = new mysqli("localhost", "aliawadh_senadm", "dGT(aXT8,(1~", "aliawadh_sensor");

				if (mysqli_connect_error()) {
					die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
					exit();
				}

				$result = $mysqli->query("INSERT INTO `aliawadh_sensor`.`user_accounts` " . 
					"(`user_id`, `username`, `password`, `full_name`, `address`, `user_group`) VALUES " . 
					"(NULL, '" . $_GET['username'] . "', '" . $_GET['password'] . "', '" . $_GET['full_name'] . "', '" . $_GET['address'] . 
					"', '" . $_GET['user_group'] . "')");
				echo "<br>Result of insert query is: " . $result;
				printf("Errormessage: %s\n", $mysqli->error);

				$mysqli->close();
			}
			else {
		?>
		<form name="user_accounts_insert_form" method="get">
			username: <input type="text" name="username"><br>
			password: <input type="text" name="password"><br>
			full_name: <input type="text" name="full_name"><br>
			address: <input type="text" name="address"><br>
			user_group: <input type="text" name="user_group"><br>
			<input type="submit" value="Submit">
		</form>
		<?php
			}
		?>
	</body>
</html>
