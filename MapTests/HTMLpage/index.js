 window.addEventListener("load",getJson);
 
 function MapInit(event) {
	var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: event
        });
        var marker = new google.maps.Marker({
          position: event,
          map: map
        });
      }
	  
function getJson(){	
	var xhttp = new XMLHttpRequest();
	console.log("heloo");
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		// Typical action to be performed when the document is ready:
		console.log("test");
		console.dir(xhttp.responseText);
		var eventJson = JSON.parse(xhttp.responseText);
		createMarker(eventJson);

		}
	};
	var urlWithParam = "http://itsuite.it.brighton.ac.uk/jh1152/mobileapp/maptests/eventApi.php";
	xhttp.open("GET", urlWithParam, true);
	xhttp.send();
	
}

function createMarker(event){
	console.log(event[0].ID);
	console.log(event[0].LONGITUDE);
	var eventLong = parseFloat(event[0].LONGITUDE);
	var eventLat = parseFloat(event[0].LATITUDE);
	var uluru = {lat: eventLat, lng: eventLong};
	console.log(uluru);
	MapInit(uluru);
}

