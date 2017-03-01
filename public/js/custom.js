document.onready = function(){
    loadMap();
}
var sourceDistanceLat = '';
var sourceDistanceLong = '';
var destinationDistanceLat = '';
var destinationDistanceLong = '';

var currentLocation = false;

var styles = {
    default: null,
    night: [
        {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
        {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
        {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
        {
            featureType: 'administrative.locality',
            elementType: 'labels.text.fill',
            stylers: [{color: '#d59563'}]
        },
        {
            featureType: 'poi',
            elementType: 'labels.text.fill',
            stylers: [{color: '#d59563'}]
        },
        {
            featureType: 'poi.park',
            elementType: 'geometry',
            stylers: [{color: '#263c3f'}]
        },
        {
            featureType: 'poi.park',
            elementType: 'labels.text.fill',
            stylers: [{color: '#6b9a76'}]
        },
        {
            featureType: 'road',
            elementType: 'geometry',
            stylers: [{color: '#38414e'}]
        },
        {
            featureType: 'road',
            elementType: 'geometry.stroke',
            stylers: [{color: '#212a37'}]
        },
        {
            featureType: 'road',
            elementType: 'labels.text.fill',
            stylers: [{color: '#9ca5b3'}]
        },
        {
            featureType: 'road.highway',
            elementType: 'geometry',
            stylers: [{color: '#746855'}]
        },
        {
            featureType: 'road.highway',
            elementType: 'geometry.stroke',
            stylers: [{color: '#1f2835'}]
        },
        {
            featureType: 'road.highway',
            elementType: 'labels.text.fill',
            stylers: [{color: '#f3d19c'}]
        },
        {
            featureType: 'transit',
            elementType: 'geometry',
            stylers: [{color: '#2f3948'}]
        },
        {
            featureType: 'transit.station',
            elementType: 'labels.text.fill',
            stylers: [{color: '#d59563'}]
        },
        {
            featureType: 'water',
            elementType: 'geometry',
            stylers: [{color: '#17263c'}]
        },
        {
            featureType: 'water',
            elementType: 'labels.text.fill',
            stylers: [{color: '#515c6d'}]
        },
        {
            featureType: 'water',
            elementType: 'labels.text.stroke',
            stylers: [{color: '#17263c'}]
        }
    ],

    retro: [
        {elementType: 'geometry', stylers: [{color: '#ebe3cd'}]},
        {elementType: 'labels.text.fill', stylers: [{color: '#523735'}]},
        {elementType: 'labels.text.stroke', stylers: [{color: '#f5f1e6'}]},
        {
            featureType: 'administrative',
            elementType: 'geometry.stroke',
            stylers: [{color: '#c9b2a6'}]
        },
        {
            featureType: 'administrative.land_parcel',
            elementType: 'geometry.stroke',
            stylers: [{color: '#dcd2be'}]
        },
        {
            featureType: 'administrative.land_parcel',
            elementType: 'labels.text.fill',
            stylers: [{color: '#ae9e90'}]
        },
        {
            featureType: 'landscape.natural',
            elementType: 'geometry',
            stylers: [{color: '#dfd2ae'}]
        },
        {
            featureType: 'poi',
            elementType: 'geometry',
            stylers: [{color: '#dfd2ae'}]
        },
        {
            featureType: 'poi',
            elementType: 'labels.text.fill',
            stylers: [{color: '#93817c'}]
        },
        {
            featureType: 'poi.park',
            elementType: 'geometry.fill',
            stylers: [{color: '#a5b076'}]
        },
        {
            featureType: 'poi.park',
            elementType: 'labels.text.fill',
            stylers: [{color: '#447530'}]
        },
        {
            featureType: 'road',
            elementType: 'geometry',
            stylers: [{color: '#f5f1e6'}]
        },
        {
            featureType: 'road.arterial',
            elementType: 'geometry',
            stylers: [{color: '#fdfcf8'}]
        },
        {
            featureType: 'road.highway',
            elementType: 'geometry',
            stylers: [{color: '#f8c967'}]
        },
        {
            featureType: 'road.highway',
            elementType: 'geometry.stroke',
            stylers: [{color: '#e9bc62'}]
        },
        {
            featureType: 'road.highway.controlled_access',
            elementType: 'geometry',
            stylers: [{color: '#e98d58'}]
        },
        {
            featureType: 'road.highway.controlled_access',
            elementType: 'geometry.stroke',
            stylers: [{color: '#db8555'}]
        },
        {
            featureType: 'road.local',
            elementType: 'labels.text.fill',
            stylers: [{color: '#806b63'}]
        },
        {
            featureType: 'transit.line',
            elementType: 'geometry',
            stylers: [{color: '#dfd2ae'}]
        },
        {
            featureType: 'transit.line',
            elementType: 'labels.text.fill',
            stylers: [{color: '#8f7d77'}]
        },
        {
            featureType: 'transit.line',
            elementType: 'labels.text.stroke',
            stylers: [{color: '#ebe3cd'}]
        },
        {
            featureType: 'transit.station',
            elementType: 'geometry',
            stylers: [{color: '#dfd2ae'}]
        },
        {
            featureType: 'water',
            elementType: 'geometry.fill',
            stylers: [{color: '#b9d3c2'}]
        },
        {
            featureType: 'water',
            elementType: 'labels.text.fill',
            stylers: [{color: '#92998d'}]
        }
    ],

    hiding: [
        {
            featureType: 'poi.business',
            stylers: [{visibility: 'off'}]
        },
        {
            featureType: 'transit',
            elementType: 'labels.icon',
            stylers: [{visibility: 'off'}]
        }
    ]
};

function setCurrentSource(map){

    if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(function (position) {

            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            var marker = new google.maps.Marker({
                position: pos,
                map: map,
                title: 'Hello World!'
            });
            console.log(marker);

        });
    }
}

function loadMap() {

    var map = new google.maps.Map(document.getElementById('map'), {
        mapTypeControl: false,
        center: {lat: 20.5937, lng: 78.9629},
        zoom: 5,
        fullscreenControl: true,
        scaleControl: true
    });


    // Add a style-selector control to the map.
    var styleControl = document.getElementById('style-selector-control');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(styleControl);

    // Set the map's style to the initial value of the selector.


    var hours = new Date().getHours();
    var hours = (hours+24-2)%24;
    var mid='am';
    if(hours==0){ //At 00 hours we need to show 12 am
        hours=12;
    }
    else if(hours>12)
    {
        hours=hours%12;
        mid='pm';
    }

    if(mid == 'am' || new Date().getHours() >=20 ){
        // map.setOptions({styles: styles['retro']});
        map.setOptions({styles: styles['night']});
    }else{
        // map.setOptions({styles: styles['night']});
        map.setOptions({styles: styles['retro']});
    }


    if(!currentLocation){
        currentLocation = true;
        //setCurrentSource(map);
    }

    new AutocompleteDirectionsHandler(map);




}

function CenterControl(controlDiv, map) {

    // Set CSS for the control border.
    var controlUI = document.getElementById('style-selector-control');
    controlUI.style.backgroundColor = '#000';
    controlUI.style.width = '100%';
    controlUI.style.padding = '1%';
    controlUI.style.opacity = '0.8';
    controlUI.style.marginLeft = '1px';
    controlUI.style.border = '2px solid #fff';
    controlUI.style.borderRadius = '3px';
    controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
    controlUI.style.cursor = 'pointer';
    controlUI.style.marginBottom = '22px';
    controlUI.style.textAlign = 'center';
    controlUI.title = 'Click to recenter the map';
    controlDiv.append(controlUI);

    // Set CSS for the control interior.
    var controlText = document.createElement('style-selector-control');
    controlText.style.color = 'rgb(25,25,25)';
    controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
    controlText.style.fontSize = '16px';
    controlUI.style.opacity = '1';
    controlText.style.lineHeight = '38px';
    controlText.style.paddingLeft = '5px';
    controlText.style.height = '50px';
    controlText.style.paddingRight = '5px';
    controlText.innerHTML = 'Center Map';
    controlUI.append(controlText);

}

/**
 * @constructor
 */
function AutocompleteDirectionsHandler(map) {

    this.map = map;
    this.originPlaceId = null;
    this.destinationPlaceId = null;
    this.travelMode = 'WALKING';

    var originInput = document.getElementById('origin-input');
    var destinationInput = document.getElementById('destination-input');
    var modeSelector = document.getElementById('mode-selector');

    this.directionsService = new google.maps.DirectionsService;
    this.directionsDisplay = new google.maps.DirectionsRenderer({ polylineOptions: { strokeColor: "red",strokeWeight: 5,strokeOpacity: 0.9} },{ suppressMarkers: true });
    this.directionsDisplay.setMap(map);

    var originAutocomplete = new google.maps.places.Autocomplete(originInput, {placeIdOnly: true});
    var destinationAutocomplete = new google.maps.places.Autocomplete(destinationInput, {placeIdOnly: true});

    this.setupClickListener('changemode-walking', 'WALKING');
    this.setupClickListener('changemode-transit', 'TRANSIT');
    this.setupClickListener('changemode-driving', 'DRIVING');

    this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
    this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');



    var centerControlDiv = document.getElementById('style-selector-control');
    var centerControl = new CenterControl(centerControlDiv, map);

    centerControlDiv.index = 1;
}

// Sets a listener on a radio button to change the filter type on Places
// Autocomplete.
AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
    var radioButton = document.getElementById(id);
    var me = this;
    radioButton.addEventListener('click', function() {
        me.travelMode = mode;
        me.route();
    });
};

AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
    var me = this;
    autocomplete.bindTo('bounds', this.map);
    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        if (!place.place_id) {
            window.alert("Please select an option from the dropdown list.");
            return;
        }
        if (mode === 'ORIG') {
            me.originPlaceId = place.place_id;
        } else {
            me.destinationPlaceId = place.place_id;
        }
        me.route();
    });

};

AutocompleteDirectionsHandler.prototype.route = function() {
    if (!this.originPlaceId || !this.destinationPlaceId) {
        return;
    }

    var me = this;

    this.directionsService.route({
        origin: {'placeId': this.originPlaceId},
        destination: {'placeId': this.destinationPlaceId},
        travelMode: this.travelMode
    }, function(response, status) {
        if (status === 'OK') {
            me.directionsDisplay.setDirections(response);
            var trafficLayer = new google.maps.TrafficLayer();
            trafficLayer.setMap(map);
        } else {
            window.alert('Directions request failed due to ' + status);
        }
    });

    source = document.getElementById("origin-input").value;
    destination = document.getElementById("destination-input").value;

    //*********DISTANCE AND DURATION**********************//
    var service = new google.maps.DistanceMatrixService();
    service.getDistanceMatrix({
        origins: [source],
        destinations: [destination],
        travelMode:this.travelMode,
        unitSystem: google.maps.UnitSystem.METRIC,
        avoidHighways: false,
        avoidTolls: false
    }, function (response, status) {
        if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
            var distance = response.rows[0].elements[0].distance.text;
            var duration = response.rows[0].elements[0].duration.text;
            var dvDistance = document.getElementById("dvDistance");
            dvDistance.innerHTML = "";
            dvDistance.innerHTML += "Distance: " + distance + "<br />";
            dvDistance.innerHTML += "Duration:" + duration;
            $("#dvDistance").show();
            map.controls[google.maps.ControlPosition.TOP_LEFT].push('dvDistance');
        } else {
            alert("Unable to find the distance via road.");
        }
    });

};

function computeDistance(){
    var geocoder = new google.maps.Geocoder();
    var sourcePlace = $("#origin-input").val();

    geocoder.geocode({'address': sourcePlace},
        function (results, status) {

            if (status == google.maps.GeocoderStatus.OK) {
                var latitude = results[0].geometry.location.lat();
                var longitude = results[0].geometry.location.lng();
                    sourceDistanceLat = latitude;
                    sourceDistanceLong = longitude;

            }else{
                alert('unable to get location');
            }
        });



    var destinationPlace = $("#destination-input").val();
    geocoder.geocode({'address': destinationPlace},
        function (results, status) {

            if (status == google.maps.GeocoderStatus.OK) {
                var latitude = results[0].geometry.location.lat();
                var longitude = results[0].geometry.location.lng();

                    destinationDistanceLat = latitude;
                    destinationDistanceLong = longitude;
            }else{
                alert('unable to get location');
            }
        });

    var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(sourceDistanceLat, sourceDistanceLong), new google.maps.LatLng(destinationDistanceLat, destinationDistanceLong));
    distance = Math.round((distance * 100) / 100);
    var kilometer = (distance / 1000);
    distance = (distance / 1000) + " Km ";
    if (kilometer < 1 || kilometer == 0) {
        distance = (distance % 1000) + " M ";
    }else{
    distance = 'xx Km';
    }
    alert(distance);
}

function GetLatlong(address,type) {

    var geocoder = new google.maps.Geocoder();

    geocoder.geocode({'address': address},
        function (results, status) {

            if (status == google.maps.GeocoderStatus.OK) {
                var latitude = results[0].geometry.location.lat();
                var longitude = results[0].geometry.location.lng();

                if(type == 'source'){
                    sourceDistanceLat = latitude;
                    sourceDistanceLong = longitude;
                }else{
                    destinationDistanceLat = latitude;
                    destinationDistanceLong = longitude;
                }
            }else{
                alert('unable to get location');
            }
            return 'here';
    });
    console.log(sourceDistanceLat);
    console.log(sourceDistanceLong);
}