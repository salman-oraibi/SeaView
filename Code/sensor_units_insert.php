<!DOCTYPE html>
<html>
	<head>
		<title>Sensor unit insert</title>
		<meta name="viewport" content="width=device-width">
	</head>
	<body>
		<h1>Sensor Units insert</h1>
		<?php
			//if (count($_GET) > 0)
			if ($_GET['mac_address'] != '' && $_GET['serial_number'] != '' && $_GET['model'] != '' && $_GET['status'] != '')
			{
				$tab = "\t\t";
				echo "<p><div>" . PHP_EOL;
				$tab2 = "\t\t\t";
				echo $tab2 . "These will be inserted in the data base ..." . "<br>" . PHP_EOL;
				echo $tab2 . "mac_address: " . $_GET['mac_address'] . "<br>" . PHP_EOL;
				echo $tab2 . "serial_number: " . $_GET['serial_number'] . "<br>" . PHP_EOL;
				echo $tab2 . "model: " . $_GET['model'] . "<br>" . PHP_EOL;
				echo $tab2 . "status: " . $_GET['status'] . "<br>" . PHP_EOL;
				echo $tab . "</div></p>" . PHP_EOL;

				$mysqli = new mysqli("localhost", "aliawadh_senadm", "dGT(aXT8,(1~", "aliawadh_sensor");

				if (mysqli_connect_error()) {
					die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
					exit();
				}
				
				$result = $mysqli->query("INSERT INTO `aliawadh_sensor`.`sensor_units` (`unit_id`, `mac_address`, `serial_number`, `model`, `status`) VALUES (NULL, '" . $_GET['mac_address'] . "', '" . $_GET['serial_number'] . "', '" . $_GET['model'] . "', '" . $_GET['status'] . "')");
				echo "<br>Result of insert query is: " . $result;

				$mysqli->close();
			}
			else {
		?>
		<form name="sensor_unit_insert_form" method="get">
			mac_address: <input type="text" name="mac_address"><br>
			serial_number: <input type="text" name="serial_number"><br>
			model: <input type="text" name="model"><br>
			status: <input type="text" name="status"><br>
			<input type="submit" value="Submit">
		</form>
		<?php
			}
		?>
	</body>
</html>
