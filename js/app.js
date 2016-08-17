var output = document.getElementById("demo");
var longLng = 60.1435707 + "," + -176.4296819;

function getLocation(position) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            output.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

function showPosition(position) {

    // output.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude; 
    var posLong = position.coords.longitude; 
    var posLat = position.coords.latitude; 
    var mapDiv = document.getElementById('map');
    var map = new google.maps.Map(mapDiv, {
        center: {lat: posLat, lng: posLong},
        zoom: 17
    });

    // database submission
    var nameofspot = document.getElementById("nameofspot").value;
    document.getElementById("l").value = posLat; 
    document.getElementById("g").value = posLong;
    document.getElementById("locationForm").submit();
    }
    // google API
function initMap() {
    var mapDiv = document.getElementById('map');
    var map = new google.maps.Map(mapDiv, {
        center: {lat: 37.413074, lng: -122.1248581},
        zoom: 17
    });
    }

function getLocationDB(position) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPositionDB);
        } else {
            output.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

// The list of items stored in the database is populated into the DOM
// with a class name of getdata. The following 10 lines of code
// get the attribute value and stores it in the longLng variable to be used
// when the event handler that is attacted triggers the function getLocationDB()
// example of a li item that is populated from the database
// <li><button class='getdata' onclick='getLocationDB()' value='21.3682079,-157.9429837'>button</button>Pearl Harbor</li>
var getdata = document.getElementsByClassName("getdata");

var longLngCoords = function() {
    longLng = this.getAttribute("value");
};

for (var i = 0; i < getdata.length; i++) {
    getdata[i].addEventListener('click', longLngCoords, false);
}

function showPositionDB(position) {

    // parse coords string for use with google.maps.LatLng
    var trimCoords = longLng;
    var begin = trimCoords.search(",") + 1;
    var zero = trimCoords.search(",");
    var end = trimCoords.length;
    var splitOne = trimCoords.slice(begin, end);
    var splitTwo = trimCoords.slice(0, zero);
    var myLatlng = new google.maps.LatLng(splitTwo,splitOne);
    var myOptions = {
        zoom: 17,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    map = new google.maps.Map(document.getElementById("map"), myOptions);
}
