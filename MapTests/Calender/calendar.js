window.addEventListener("load", function(event) {    pageLoad();  });
	//	page load to trigger calendar stuff
function pageLoad(){
		console.log("init hello");
		getDates()
	}
	var eventList= [];
	
	
	
	var test = '2016-05-04'; 
	console.log(test);
	
	// generates a callender populating with events returned by generateevents
function createCalender() {
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      defaultDate: '2018-03-12',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: eventList
    });
  };
  
  // Ajax call to custom api to return events
  // this will be developed into querying for campuses
function getDates(){	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		
		if (this.readyState === 4 && this.status === 200) {		
		//	parse the response info creation psssing in parsed JSON  
		//	event Json changed to global scope to allow it to be picked up be click event
		var calendarJson = JSON.parse(xhttp.responseText);	
		generateEvents(calendarJson);
		//	test logs for checking objects
		console.dir(xhttp.responseText);		

		}
	};
	//	exicute api call
	var urlWithParam = "http://itsuite.it.brighton.ac.uk/jh1152/mobileapp/maptests/database/eventApi.php";
	xhttp.open("GET", urlWithParam, true);
	xhttp.send();	
	}

	
	// generates a json from the DATE and NAME fields from the api
function generateEvents(evntJson){
		for (var i = 0; i < evntJson.length; i++) {
			//if(evntJson[i].ID === "6"){
			eventList.push({
				title: evntJson[i].NAME,
				start: evntJson[i].DATE        
			});
			//}
		}
			createCalender();
			console.log(eventList);			
		}
	

