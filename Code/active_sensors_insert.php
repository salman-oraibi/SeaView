<!DOCTYPE html>
<html>
	<head>
		<title>Active Sensors insert</title>
		<meta name="viewport" content="width=device-width">
	</head>
	<body>
		<h1>Active Sensors insert</h1>
		<?php
			// Report all PHP errors (see changelog)
			error_reporting(E_ALL);

			if ($_GET['unit_id'] != '' && $_GET['user_id'] != '' && $_GET['longitude'] != '' && 
				$_GET['latitude'] != '' && $_GET['altitude'] != '' && $_GET['status'] != '')
			{
				$tab = "\t\t";
				echo "<p><div>" . PHP_EOL;
				$tab2 = "\t\t\t";
				echo $tab2 . "These will be inserted in the data base ..." . "<br>" . PHP_EOL;
				echo $tab2 . "unit_id: " . $_GET['unit_id'] . "<br>" . PHP_EOL;
				echo $tab2 . "user_id: " . $_GET['user_id'] . "<br>" . PHP_EOL;
				echo $tab2 . "longitude: " . $_GET['longitude'] . "<br>" . PHP_EOL;
				echo $tab2 . "latitude: " . $_GET['latitude'] . "<br>" . PHP_EOL;
				echo $tab2 . "altitude: " . $_GET['altitude'] . "<br>" . PHP_EOL;
				echo $tab2 . "status: " . $_GET['status'] . "<br>" . PHP_EOL;
				echo $tab . "</div></p>" . PHP_EOL;

				$mysqli = new mysqli("localhost", "aliawadh_senadm", "dGT(aXT8,(1~", "aliawadh_sensor");

				if (mysqli_connect_error()) {
					die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
					exit();
				}

				$result = $mysqli->query("INSERT INTO `aliawadh_sensor`.`active_sensors` " . 
					"(`activation_id`, `unit_id`, `user_id`, `longitude`, `latitude`, `altitude`, `status`) VALUES " . 
					"(NULL, '" . $_GET['unit_id'] . "', '" . $_GET['user_id'] . "', '" . $_GET['longitude'] . "', '" . $_GET['latitude'] . 
					"', '" . $_GET['altitude'] . "', '" . $_GET['status'] . "')");
				echo "<br>Result of insert query is: " . $result;
				printf("Errormessage: %s\n", $mysqli->error);

				$mysqli->close();
			}
			else {
		?>
		<form name="active_sensors_insert_form" method="get">
			unit_id: <input type="text" name="unit_id"><br>
			user_id: <input type="text" name="user_id"><br>
			longitude: <input type="text" name="longitude"><br>
			latitude: <input type="text" name="latitude"><br>
			altitude: <input type="text" name="altitude"><br>
			status: <input type="text" name="status"><br>
			<input type="submit" value="Submit">
		</form>
		<?php
			}
		?>
	</body>
</html>
