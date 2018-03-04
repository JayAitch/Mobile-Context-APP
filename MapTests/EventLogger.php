<html>
<head></head>
<body>
<h1>Enter details to post to database</h1>
<?php

$html = '<form method="post">'
	.'Longitude: <input type ="decimal" name="logitude" ><br>'
	.'Latitude: <input type="text" name="latitude" ><br>'
	.'Event Name: <input type="text" name="name" ><br>'
	.'Description: <input type="text" name="description" ><br>'
	.'Date: <input type="date" name="date" ><br>'
	.'<input type="submit"><br>'
	.'</form>';







if(isset($_POST['logitude'],$_POST['latitude'],$_POST['name'])){
	$Long = $_POST['logitude'];
	$Lat = $_POST['latitude'];
	$Name = $_POST['name'];
	$Desc = $_POST['description'];
	$Date = $_POST['date'];
	
	$mysqli = mysqli_connect('itsuite.it.brighton.ac.uk', 'jh1152' ,'jh1152', 'jh1152_appdata');
	$query = 		"INSERT INTO eventsdb (LONGITUDE, LATITUDE, NAME, DESCRIPTION, DATE )VALUES ('$Long', '$Lat','$Name', '$Desc','$Date')";
	echo $query;
	$result = mysqli_query($mysqli, $query);
	mysqli_close($mysqli);
	$html = "Success, '$Long', '$Lat','$Name', '$Desc','$Date'<br>";
}



echo "<br>";
echo $html;

?>
</body>
</html>