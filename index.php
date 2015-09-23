<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Robotics Login</title>
		<meta name="description" content="MICDS Robotics Login">
		<meta name="author" content="Michel Ge & Bob Sforza">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" rel="stylesheet">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Syncopate:700' rel='stylesheet' type='text/css'> -->
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	</head>
	<body>
		<?php
			if ($_POST["name"] != "") { 
				echo "Your name is " . $_POST["name"];
			}
		?>

		<form action="http://micdsrobotics.herokuapp.com" method="post">
			<select id="name" name="name">
			  <option value="Bob">Bob</option>
			  <option value="Michel">Michel</option>
			  <option value="Amir">Amir</option>
			  <option value="Ehan">Ehan</option>
			  <option value="Jackson">Jackson</option>
			  <option value="Megan">Megan</option>
			  <option value="Matt">Matt</option>
			  <option value="Blake">Blake</option>
			  <option value="August">August</option>
			  <option value="Kendall">Kendall</option>
			  <option value="Justin">Justin</option>
			  <option value="Julian">Julian</option>
			  <option value="Kristin">Kristin</option>
			  <option value="Sophia">Sophia</option>
			  <option value="Clayton">Clayton</option>
			  <option value="Sophie">Sophie</option>
			  <option value="DeRon">Deron</option>
			  <option value="Wilson">Wilson</option>
			  <option value="Charlie">Charlie</option>
			  <option value="Josh">Josh</option>
			</select>
		<input type="submit">
		</form>
	</body>
</html>
