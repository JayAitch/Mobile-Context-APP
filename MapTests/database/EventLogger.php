<!--Document to for logging test data to the server-->
<html>
<head></head>
<body>
<h1>Enter details to post to database</h1>
<?php
//API currently lacks sanitation so please enter data correctly

//html form for entering data
$html = '<form method="post">'
	.'Latitude(decimal(10,7)): <input type="text" name="latitude" ><br>'
	.'Longitude(decimal(10,7)): <input type ="decimal" name="logitude" ><br>'	
	.'Event Name(Varchar[50]): <input type="text" name="name" ><br>'
	.'Description(Varchar [500]): <input type="text" name="description" ><br>'
	.'Date: <input type="date" name="date" ><br>'
	.'<input type="submit"><br>'
	.'Table also accepts blob for images and id (AI) -- API currently lacks sanitation so please enter data correctly'
	.'</form>';


//using post data generates a query and posts it to the database
if(isset($_POST['logitude'],$_POST['latitude'],$_POST['name'])){
	$Long = $_POST['logitude'];
	$Lat = $_POST['latitude'];
	$Name = $_POST['name'];
	$Desc = $_POST['description'];
	$Date = $_POST['date'];
	
	//exicuting query and echoing for posting
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