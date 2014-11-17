<!DOCTYPE html>
<html>
	<head>
		<title>Welcome</title>
		<meta name="viewport" content="width=device-width">
	</head>
	<body>
		<h1>Sensor's site</h1>
		<?php
			function print_result_as_html_table($r) {
				$row = $r->fetch_assoc();
				?>
				<p>
				<table border="1">
					<thead>
						<tr>
							<th><?php echo implode('</th><th>', array_keys($row)); ?></th>
						</tr>
					</thead>
					<tbody>
				<?php
				$r->data_seek(0);
				while ($row = $r->fetch_assoc()) {
					?>
						<tr>
							<td><?php echo implode('</td><td>', array_values($row)); ?></td>
						</tr>
					<?php
				} 	// end while
				?>
					<tbody>
				</table>
				</p>
				<?php
			}

			$mysqli = new mysqli("localhost", "aliawadh_senadm", "dGT(aXT8,(1~", "aliawadh_sensor");

			if (mysqli_connect_error()) {
				die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
				exit();
			}
			
			$result = $mysqli->query("SELECT * FROM `sensor_units`");
			echo "<h3>sensor_units</h3>";
			print_result_as_html_table($result);

			$result2 = $mysqli->query("SELECT * FROM `readings`");
			echo "<h3>readings</h3>";
			print_result_as_html_table($result2);

			$result3 = $mysqli->query("SELECT * FROM `active_sensors`");
			echo "<h3>active_sensors</h3>";
			print_result_as_html_table($result3);

			$result4 = $mysqli->query("SELECT * FROM `user_accounts`");
			echo "<h3>user_accounts</h3>";
			print_result_as_html_table($result4);

			$mysqli->close();
		?>
		<p>
			<div>
				- <a href="sensor_units_insert.php">Sensor Units Insert</a><br>
				- <a href="readings_insert.php">Readings Insert</a><br>
				- <a href="active_sensors_insert.php">Active Sensors Insert</a><br>
				- <a href="user_accounts_insert.php">User Accounts Insert</a><br>
			</div>
		</p>
	</body>
</html>
