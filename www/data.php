<!doctype html>
<html>
	<head>
		<title>Bit-Biosignals</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
		<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
		<script type="text/javascript" src="js/dygraph-combined-dev.js"></script>
		<script type="text/javascript" src="js/graph.js"></script>
	</head>

	<body>
		<div id="sidebar">
			<h1>Bit-Biosignals server viewer</h1>
			<h2>A resource to view health monitoring data received by the server</h2>

			<div id="menu">
				<a href="index.php">Home</a>
				<a class="active" href="data.php">Patient Data</a>
			</div>

			<h3>Version info:</h3>
			<p>v1.0</p>
			<footer>&copy; David Read (A913927)<br />Loughborough University</footer>
		</div>

		<div id="content">
		  <h1>Patient Data</h1>
		  <h2>Patient data received by the server</h2>

		  <h3>Patient data selection</h3>

		  <label for='patient'>Please select a patient data file: </label>

				<?php
					// make array of files in data directory
					$files = scandir("/home/pi/git/project/www/data/");
					unset($files[0]); // remove . entry
					unset($files[1]); // remove .. entry
					
					// populate select options with scanned files from directory
					echo "<select id=\"patient\" name=\"patient\">";
					echo "<option>-- Select a patient data file --</option>\n";
					foreach ($files as $file) {
						echo "<option value=\"$file\">$file</option>\n";
					}
					echo "</select>";
				?>

		  <div id="graph"><!-- GRAPH GOES HERE --></div>
		</div>
	</body>
</html>
