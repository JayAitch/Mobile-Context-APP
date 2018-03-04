 function MapInit() {
	 console.log("hi");
var uluru = {lat: -25.363, lng: 131.044};



var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center:{ lat:50.853554, lng: 0.562999}
        });
        var marker = new google.maps.Marker({
          position: { lat:50.853554, lng: 0.562999},
          map: map
        });
      }
