	//	added a load event listener to fire ajax on page load DOM event information immediately after
	// as well as doming button events for creating the map
window.addEventListener("load", function(event) {    init();  });
function init(){
		console.log("init hello");
		var mapBttn = document.getElementById('map-bttn');	
		mapBttn.addEventListener("click", createMarker);
		getJson();		
	}
	

	  
	  
	  //	get json will exicute ajax to eventAPI and populate json variables
	  //	this method was called via the google maps async defer via callback 
	  //	is now called via e3vent listener on page load to allow map and events to be generated seperately
	  //	this calls on page load simular to windows.eventlistener
function getJson(){	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		
		if (this.readyState === 4 && this.status === 200) {		
		//	parse the response info creation psssing in parsed JSON  
		//	event Json changed to global scope to allow it to be picked up be click event
		eventJson = JSON.parse(xhttp.responseText);	
		createInfo();
		
		//	test logs for checking objects
		console.dir(xhttp.responseText);		

		}
	};
	//	exicute api call
	var urlWithParam = "http://itsuite.it.brighton.ac.uk/jh1152/mobileapp/maptests/database/eventApi.php?id=" + id;
	xhttp.open("GET", urlWithParam, true);
	xhttp.send();
	console.log(id);
	
}
	//	generate "marker" from event position information handed from the API
function createMarker(){
	//	test logs for checking the object
	
	console.log(eventJson[0].ID);
	console.log(eventJson[0].LONGITUDE);
	//	parse json data into float
	var eventLong = parseFloat(eventJson[0].LONGITUDE);
	var eventLat = parseFloat(eventJson[0].LATITUDE);
	//	gerate lat lng literal from json attributes
	var location = {lat: eventLat, lng: eventLong};
	mapInit(location);
}


//create map and resize container 
function mapInit(eventPos) {
	//var mapDiv = document.createElement("div");
	//mapDiv.setAttribute("id", "map")
	var mapWrapper = document.getElementById('map').style.height= "50vh";
	var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: eventPos
        });		
        var marker = new google.maps.Marker({
          position: eventPos,
          map: map
        });
      }
	  
	  
	  
	  
	  
	//	This method is simply DOMing page elements from table contents 
function createInfo() {
	
	//console.log()
	var blankColumn = "No Information entered by the event organiser";
	
			//	create elements 
			 var e = document.createElement("div");
			 var eDate = document.createElement("p");
			 var eDescr = document.createElement("p");
			// var eImg = document.createElement("img");
			 // select
			 var eName = document.querySelector("#event-name");
			 
			
			//	set selector
			e.setAttribute("class", "event-info");
			
			//	generate paragram contents through json attibutes			
			eName.textContent = "Directions to " + eventJson[0].NAME;
			
			eDate.textContent =  "Date" + eventJson[0].DATE;
			eDescr.textContent = eventJson[0].DESCRIPTION;	
			
			
			//	select wrapper and append elements
			 var wrapper_div = document.querySelector("#event-wrapper");			 
			 e.appendChild(eDate);
			 e.appendChild(eDescr);			
			 wrapper_div.appendChild(e);		

}