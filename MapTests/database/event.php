<?php




//printing results inside table from sql database

	
	//create sql connection and select the entire table
	$mysqli = mysqli_connect('itsuite.it.brighton.ac.uk', 'jh1152' ,'jh1152', 'jh1152_appdata');
	$query = 		"SELECT * FROM eventsdb";
	$eventArray = array();
	//exicute query and check for success
	if($result = mysqli_query($mysqli, $query)){
		//generate html table from sql query
		 $html = "<table id='results-table'>"
				 ."<tr><th>LAT</th><th>LONG</th><th>NAME</th><th>DESCRIPTION</th><th>DATE</th></tr>";
			
			 while ($row = mysqli_fetch_assoc($result)) {
				//per row with while loop
				 $html = $html. '<tr> <td>    '.$row['LONGITUDE'].'     </td>'
					 .'<td>'    .$row['LATITUDE'].   '     </td>'
					 .'<td>'   .$row['NAME'].    '     </td>' 
					 .'<td>'   .$row['DESCRIPTION'].    '     </td>' 
					 .'<td>'   .$row['DATE'].    '     </td></tr>'; 
					
					
					$eventArray[] = $row;

			 }
		 $html = $html. "</table>";
		
		echo json_encode($eventArray);
		
		mysqli_close($mysqli);
	}
	else{
		$html = "query unssucessfil";
	}
echo $html;
echo "<br>";
	

?>
