<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='fullcalendar.min.css' rel='stylesheet' />
<link href='fullcalendar.print.min.css' rel='stylesheet' media='print' />
<link href='calendar.css' rel='stylesheet'/>
<script src='lib/moment.min.js'></script>
<script src='lib/jquery.min.js'></script>
<script src='fullcalendar.min.js'></script>
<script src= 'calendar.js'></script>


</head>
<body>
<?php
// get to check for campus selection
if(isset($_GET['campus'])){
  echo '<h2>'. $_GET['campus'].'</h2>';
  echo "<div id='calendar'></div>";
}

//if no campus selection show buttons to select campus
else{
	echo    "<div id='calendar-btns'>";
	echo 	"<a class='campus-get-btn' href = 'calender.php?campus=brighton'>Brighton</a>";
	echo 	"<a class='campus-get-btn' href = 'calender.php?campus=eastbourne'>Eastbourne</a>";
	echo 	"<a class='campus-get-btn' href='calender.php?campus=hastings'>Hastings</a>";
	echo    "</div>";
}
?>
</body>
</html>
