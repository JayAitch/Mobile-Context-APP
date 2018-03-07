<?php
//creating json for ajax method
//this if will check whether the id has been entered and creating a single row collection
if(isset($_GET['id'])){
	
	//create sql connection and select the entire table
	$mysqli = mysqli_connect('itsuite.it.brighton.ac.uk', 'jh1152' ,'jh1152', 'jh1152_appdata');
	$query = 		"SELECT * FROM eventsdb WHERE id = ".$_GET['id'];
	$eventArray = array();
	//exicute query and check for success
	if($result = mysqli_query($mysqli, $query)){
		
			//per row with while loop
			 while ($row = mysqli_fetch_assoc($result)) {								
					$eventArray[] = $row;
			 }	
		
		echo json_encode($eventArray);
	}
	mysqli_close($mysqli);
	
	
	
}

//This else will return the entire table (potentially paginated)
else{
	//create sql connection and select the entire table
	$mysqli = mysqli_connect('itsuite.it.brighton.ac.uk', 'jh1152' ,'jh1152', 'jh1152_appdata');
	$query = 		"SELECT * FROM eventsdb";
	$eventArray = array();
	//exicute query and check for success
	if($result = mysqli_query($mysqli, $query)){
		
			//per row with while loop
			 while ($row = mysqli_fetch_assoc($result)) {								
					$eventArray[] = $row;
			 }	
		
		echo json_encode($eventArray);
	}
	mysqli_close($mysqli);
}
?>
