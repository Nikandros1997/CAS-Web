var map;
var myCenter=new google.maps.LatLng(51.508742,-0.120850);
var marker;

function initialize()
{
	var mapProp = {
		center:myCenter,
		zoom: 10,
		mapTypeId:google.maps.MapTypeId.ROADMAP
	};

	map = new google.maps.Map(document.getElementById("map-container"),mapProp);

	google.maps.event.addListener(map, 'click', function(event) {
		placeMarker(event.latLng);
	});
}

function placeMarker(location) {
	if(marker != null)
 		marker.setMap(null);

	marker = new google.maps.Marker({
		position: location,
		map: map,
		icon: getPinPath()
	});

	setCoordinates(location);
}

google.maps.event.addDomListener(window, 'load', initialize);

function getPinPath() {
	var type = document.getElementById('type2').value;

	if(type.localeCompare('Creativity') == 0) {
		return 'proj-images/creativityPin2.png';
	} else if(type.localeCompare('Action') == 0) {
		return 'proj-images/actionPin2.png';
	} else {
		return 'proj-images/servicePin2.png';
	}
}

function setCoordinates(location) {
	var submit = document.getElementById('form');

	var long = document.getElementById('long');
	var lat = document.getElementById('lat');

	if(long == null) {
		long = document.createElement('input');
		long.setAttribute('type', 'hidden');
		long.setAttribute('name', 'long');
		long.setAttribute('value', location.lng());
		long.setAttribute('id', 'long');

		var lat = document.createElement('input');
		lat.setAttribute('type', 'hidden');
		lat.setAttribute('name', 'lat');
		lat.setAttribute('value', location.lat());
		lat .setAttribute('id', 'lat');

		form.appendChild(long);
		form.appendChild(lat);
	} else {
		long.setAttribute('value', location.lng());
		lat.setAttribute('value', location.lat());
	}
}

function hidePin() {
	if(marker != null)
 		marker.setMap(null);
}