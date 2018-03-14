<!DOCTYPE html>
<html>
  <head>
    <title>GoogleMaps Test</title>
		<script src="populateEvent.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css"/>	
  </head>
  <body>
    <h2 id = "event-name"></h2>
    <div id="map"></div>
    
	
	<?php	
	//Async callback loads map script
    echo '<script async defer   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmrXaRhX7G7VZ4aNvdBX4T-lFyfEUybcA&callback=getJson"></script>';
	if(isset($_GET['id'])){
		echo"<br>";
		$id = $_GET['id'];
		echo '<script>';
		echo 'var id = ' . json_encode($id) . ';';
		echo '</script>';
	}
	
	?>
    </script>
	<div id = "event-wrapper"></div>
  </body>
</html>