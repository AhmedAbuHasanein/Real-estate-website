<html >
<head>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=&v=weekly"></script>
    <script type="text/javascript">
        var latLng = {lat:54.2666, lng:45.66666};
        var markers = [];
        window.onload = function () {
            var mapOptions = {
                center: latLng,
                zoom: 5,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("modalMap"), mapOptions);
            //Create a marker and placed it on the map.
            var marker = new google.maps.Marker({
                position: latLng,
                map: map,
            });
            markers.push(marker);

            //Attach click event handler to the map.
            google.maps.event.addListener(map, 'click', function (e) {

                //Determine the location where the user has clicked.
                var location = e.latLng;

                //Create a marker and placed it on the map.
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });

                //Attach click event handler to the marker.
                google.maps.event.addListener(marker, "click", function (e) {
                    var infoWindow = new google.maps.InfoWindow({
                        content: 'Latitude: ' + location.lat() + '<br />Longitude: ' + location.lng()
                    });

                    infoWindow.open(map, marker);
                });
                DeleteMarkers(null);
                //Add marker to the array.
                markers.push(marker);
                document.getElementById('location').value= location.lat()+','+location.lng();

            });

        };
        function DeleteMarkers() {
            //Loop through all the markers and remove
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
            markers = [];
        }
    </script>
</head>
<body>
<div id="modalMap" style="width: 500px; height: 500px">
</div>
<br />
<form id="form">
    <input type="text"  id="location">
</form>
</body>
</html>
