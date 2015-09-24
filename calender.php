<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Robotics Login</title>
		<meta name="description" content="MICDS Robotics Login">
		<meta name="author" content="Michel Ge & Bob Sforza">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!--<link href='https://fonts.googleapis.com/css?family=Raleway:600' rel='stylesheet' type='text/css'>
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>-->
	</head>
	<body>

		<?php
			include 'vendor/autoload.php';

			$parser = new \Smalot\PdfParser\Parser();
			$pdf    = $parser->parseFile('cal.pdf');
			 
			$text = $pdf->getText();
			echo $text;
 
		?>

	</body>
</html>
