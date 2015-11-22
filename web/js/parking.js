var map;
var markersArray = [];

$( document ).ready(function() {

    $('.btn-map-parking').click(function() {
        var idParking = $(this).attr('id');
        var longitudeMap = 0;
        var latitudeMap = 0;
        var zoomMap = 1;
        var infosMap = '';
        var url = Routing.generate('yeu_voyage_parking_detail');

        $.ajax({
            url: url,
            type: "POST",
            data: {
                parking_id: idParking
            },
            success:function(data) {
                longitudeMap = parseFloat(data.longitude_map);
                latitudeMap = parseFloat(data.latitude_map);
                zoomMap = data.zoom_map;
                infosMap = data.nom_parking;


                var map = chargerGoogleMap(latitudeMap, longitudeMap, zoomMap, infosMap);


            }
        });

        $('.popup-map-parking').modal('show');
    });

    // Suppression des parkings
    $('.btn-suppression-parking').click(function() {
        var idParking = $(this).attr('id');
        $(".popup-confirm-suppression #parking-id").val(idParking);
        $('.popup-confirm-suppression').modal('show');
    });

    // Suppression du parking
    $('.popup-confirm-suppression .btn-save-popup').click(function() {
        var idParking = $('.popup-confirm-suppression #parking-id').val();
        var url = Routing.generate('yeu_voyage_parking_supprimer');

        $.ajax({
            url: url,
            type: "POST",
            data: {
                parking_id: idParking
            },
            success:function(data) {
                location.reload(true);
            }
        });

        $('.popup-confirm-suppression').modal('hide');
    });


    $('#form_parking_add_btn_map').click(function() {
        $('.popup-map-parking').modal('show');
        initMap();
    });
});

/**
 * Fonction permettant de charger une carte google map.
 *
 * @param latitude float latitude
 * @param longitude float longitude
 * @param zoom int zoom de la carte
 */
function chargerGoogleMap(latitude, longitude, zoom, info) {
    var myLatLng = {lat: latitude, lng: longitude};

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: zoom,
        center: myLatLng
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: info
    });

    google.maps.event.addListenerOnce(map, 'idle', function() {
        google.maps.event.trigger(map, 'resize');
        var center = new google.maps.LatLng(latitude,longitude,zoom);
        map.setCenter(center);
    });

    return map;
}

function initMap()
{
    var latlng = new google.maps.LatLng(41, 29);
    var myOptions = {
        zoom: 10,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

    // add a click event handler to the map object
    google.maps.event.addListener(map, "click", function(event)
    {
        // place a marker
        placeMarker(event.latLng);

        // display the lat/lng in your form's lat/lng fields
        document.getElementById("latFld").value = event.latLng.lat();
        document.getElementById("lngFld").value = event.latLng.lng();
    });
}
function placeMarker(location) {
    // first remove all markers if there are any
    deleteOverlays();

    var marker = new google.maps.Marker({
        position: location,
        map: map
    });

    // add marker in markers array
    markersArray.push(marker);

    //map.setCenter(location);
}

// Deletes all markers in the array by removing references to them
function deleteOverlays() {
    if (markersArray) {
        for (i in markersArray) {
            markersArray[i].setMap(null);
        }
        markersArray.length = 0;
    }
}
