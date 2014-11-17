<!DOCTYPE html>
<html>
	<head>
		<title>Readings insert</title>
		<meta name="viewport" content="width=device-width">
	</head>
	<body>
		<h1>Readings insert</h1>
		<?php
			if ($_GET['unit_id'] != '' && $_GET['date'] != '' && $_GET['temperature_above'] != '' && 
				$_GET['temperature_below'] != '' && $_GET['humidity'] != '' && $_GET['wind_speed'] != '')
			{
				$tab = "\t\t";
				echo "<p><div>" . PHP_EOL;
				$tab2 = "\t\t\t";
				echo $tab2 . "These will be inserted in the data base ..." . "<br>" . PHP_EOL;
				echo $tab2 . "unit_id: " . $_GET['unit_id'] . "<br>" . PHP_EOL;
				echo $tab2 . "date: " . $_GET['date'] . "<br>" . PHP_EOL;
				echo $tab2 . "temperature_above: " . $_GET['temperature_above'] . "<br>" . PHP_EOL;
				echo $tab2 . "temperature_below: " . $_GET['temperature_below'] . "<br>" . PHP_EOL;
				echo $tab2 . "humidity: " . $_GET['humidity'] . "<br>" . PHP_EOL;
				echo $tab2 . "wind_speed: " . $_GET['wind_speed'] . "<br>" . PHP_EOL;
				echo $tab . "</div></p>" . PHP_EOL;

				$mysqli = new mysqli("localhost", "aliawadh_senadm", "dGT(aXT8,(1~", "aliawadh_sensor");

				if (mysqli_connect_error()) {
					die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
					exit();
				}

				$result = $mysqli->query("INSERT INTO `aliawadh_sensor`.`readings` " . 
					"(`reading_id`, `unit_id`, `date`, `temperature_above`, `temperature_below`, `humidity`, `wind_speed`) VALUES " . 
					"(NULL, '" . $_GET['unit_id'] . "', '" . $_GET['date'] . "', '" . $_GET['temperature_above'] . "', '" . $_GET['temperature_below'] . 
					"', '" . $_GET['humidity'] . "', '" . $_GET['wind_speed'] . "')");
				echo "<br>Result of insert query is: " . $result;

				$mysqli->close();
			}
			else {
		?>
		<form name="readings_insert_form" method="get">
			unit_id: <input type="text" name="unit_id"><br>
			date: <input type="text" name="date">YYYY-MM-dd hh:mm:ss<br>
			temperature_above: <input type="text" name="temperature_above"><br>
			temperature_below: <input type="text" name="temperature_below"><br>
			humidity: <input type="text" name="humidity"><br>
			wind_speed: <input type="text" name="wind_speed"><br>
			<input type="submit" value="Submit">
		</form>
		<?php
			}
		?>
	</body>
</html>
