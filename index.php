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
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/particles.js"></script>
	</head>
	<body>

		<?php
			$name = $_POST["name"];
			$type = $_POST["inout"];
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
