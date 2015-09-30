<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Robotics Login</title>
		<meta name="description" content="MICDS Robotics Login">
		<meta name="author" content="Michel Ge & Bob Sforza">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link href='https://fonts.googleapis.com/css?family=Raleway:600' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js/particles.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<link href='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	</head>
	<body>
		<?php
			
			$name = $_POST["name"];
			$type = $_POST["inout"];

			$server = "us-cdbr-iron-east-03.cleardb.net";
			$username = "b0ff032e0e398e";
			$password = "2d928b7a";
			$db = "heroku_3d5da57e92aa9e3";

			$mysqli = new mysqli($server, $username, $password, $db);

			if ($type === "in") sign_in($name, $mysqli);
			else if ($type === "out") sign_out($name, $mysqli);

			// NOTE: Probably want to put the following functions in a separate file.
			// Not sure how to do that yet, so I'll leave it here for proof of concept.

			/**************************************/
			// SIGN IN AND OUT

			function sign_in($name, $mysqli) {
				date_default_timezone_set("America/Chicago");
				$unix = time();

				$statement = $mysqli->prepare("INSERT INTO temp (name, time_in)
											VALUES (?, ?)");
				$statement->bind_param('si', $name, $unix);
				$statement->execute();
				echo "<script> toastr.success('Alright. You\'re Signed in.') </script>";
			}

			function sign_out($name, $mysqli) {
				date_default_timezone_set("America/Chicago");

				$statement = $mysqli->prepare("SELECT * FROM temp
											WHERE name = ?");
				$statement->bind_param('s', $name);
				$statement->execute();
				$result = $statement->get_result();
				if ($result->num_rows === 0) {
					echo "<script> toastr.error('You aren\'t signed in...') </script>";
					return;
				}
				else {
					$time_in_seconds = time() - $result->fetch_object()->time_in;
					echo "<script> toastr.info('You have logged: " . format_time($time_in_seconds) . "') </script>";
					insert($name, format_date(time()), $time_in_seconds, $mysqli);
					$statement = $mysqli->prepare("DELETE FROM temp
												WHERE name = ?");
					$statement->bind_param('s', $name);
					$statement->execute();
				}
			}

			/****************************************/
			// UTIL

			// $time is in seconds.
			function format_time($time) {
				$hours = floor($time / 3600);
				$mins = floor(($time - ($hours * 3600)) / 60);
				$secs = floor($time % 60);
				return ($hours . " hours, " . $mins . " mins, " . $secs . " secs");
			}

			function format_date($unixTime) {
				return date("m/d h:i:s a", $unixTime);
			}

			/***********************************************/
			// DATABASE

			function insert($name, $date, $time, $mysqli) {
				$statement = $mysqli->prepare("INSERT INTO log (name, date, time)
											VALUES (?, ?, ?)");
				$statement->bind_param('ssi', $name, $date, $time);
				$statement->execute();
			}

			function get_total_time($name, $mysqli) {
				$statement = $mysqli->prepare("SELECT * FROM log
											WHERE name = ?");
				$statement->bind_param('s', $name);
				$statement->execute();
				$result = $statement->get_result();
				$total_time = 0;
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_object()) {
						$total_time += $row->time;
					}
				}
				return $total_time;
			}

			function get_leaderboard() {
				$names = ["Amir", "August", "Blake", "Bob", "Charlie", "Clayton", "DeRon", "Ehan", "Jackson", "Josh", "Julian", "Justin", "Kendall", "Kristin", "Matt", "Megan", "Michel", "Sophia", "Sophie", "Wilson"];
				$scores = [];
				$itera = 0;
				while ($itera < count($names)) {
					$scores[$names[$itera]] = get_total_time($names[$itera], $mysqli);
					$itera = $itera + 1;
				}
				echo $scores["Bob"];
			}

			// DO NOT SCREW AROUND WITH THIS:
			function delete_everything($mysqli) {
				$mysqli->query("DELETE FROM log");
			} 

			get_leaderboard();	

			?>

		<div id="wrap">
		<div id="container">
		<form action="http://micdsrobotics.herokuapp.com" method="post">
			<select id="name" name="name">
				<option selected disabled value="Name">name</option>
				<option value="Amir">Amir</option>
				<option value="August">August</option>
				<option value="Blake">Blake</option>
				<option value="Bob">Bob</option>
				<option value="Charlie">Charlie</option>
				<option value="Clayton">Clayton</option>
				<option value="DeRon">Deron</option>
				<option value="Ehan">Ehan</option>
				<option value="Jackson">Jackson</option>
				<option value="Josh">Josh</option>
				<option value="Julian">Julian</option>
				<option value="Justin">Justin</option>
				<option value="Kendall">Kendall</option>
				<option value="Kristin">Kristin</option>
				<option value="Matt">Matt</option>
				<option value="Megan">Megan</option>
				<option value="Michel">Michel</option>
				<option value="Sophia">Sophia</option>
				<option value="Sophie">Sophie</option>
				<option value="Wilson">Wilson</option>
			</select>
			<select id="inout" name="inout">
				<option selected disabled value="inout">in / out</option>
				<option value="in">in</option>
				<option value="out">out</option>
			</select>
		<input id="submit" value="go" type="submit">
		</form>
		</div>
		</div>
	</body>
</html>
