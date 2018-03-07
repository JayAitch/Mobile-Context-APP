//map init is simply generating and populating the map
 function mapInit(event) {
	var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: event
        });
        var marker = new google.maps.Marker({
          position: event,
          map: map
        });
      }
	  
	  
	  //get json will exicute ajax to eventAPI and populate json variables
	  // this method is called via the google maps async defer via callback 
	  // this calls on page load simular to windows.eventlistener
function getJson(){	
	var xhttp = new XMLHttpRequest();
	console.log("heloo");
	xhttp.onreadystatechange = function() {
		if (this.readyState === 4 && this.status === 200) {		
		// parse the response and call marker and info creation psssing in parsed JSON  
		var eventJson = JSON.parse(xhttp.responseText);	
		createMarker(eventJson);
		createInfo(eventJson);
		
		//test logs for checking objects
		console.log("test");
		console.dir(xhttp.responseText);		
		console.log("testingglobal");
		}
	};
	//exicute api call
	var urlWithParam = "http://itsuite.it.brighton.ac.uk/jh1152/mobileapp/maptests/eventApi.php?id=" + id;
	xhttp.open("GET", urlWithParam, true);
	xhttp.send();
	console.log(id);
	
}
//generate "marker" from event position information handed from the API
function createMarker(event){
	//test logs for checking the object
	console.log(event[0].ID);
	console.log(event[0].LONGITUDE);
	//parse json data into float
	var eventLong = parseFloat(event[0].LONGITUDE);
	var eventLat = parseFloat(event[0].LATITUDE);
	//gerate lat lng literal from json attributes
	var location = {lat: eventLat, lng: eventLong};
	mapInit(location);
}

// This method is simply DOMing page elements from table contents 
function createInfo(json) {
	
	console.log(json)
	var blankColumn = "No Information entered by the event organiser";
	
			//create elements 
			 var e = document.createElement("div");
			 var eDate = document.createElement("p");
			 var eDescr = document.createElement("p");
			 var eImg = document.createElement("img");
			 // select
			 var eName = document.querySelector("#event-name");
			 
			
			//set selector
			e.setAttribute("class", "event-info");
			
			//generate paragram contents through json attibutes			
			eName.textContent = "Directions to " + json[0].NAME;	
			eDate.textContnt =  json[0].DATE;
			eDescr.textContent = json[0].DESCRIPTION;	
			
			
			//	select wrapper and append elements
			 var wrapper_div = document.querySelector("#event-wrapper");			 
			 e.appendChild(eDate);
			 e.appendChild(eDescr);			
			 wrapper_div.appendChild(e);		

}