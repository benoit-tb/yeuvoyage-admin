$( document ).ready(function() {
    initMap();
    $('.btn-map-parking').click(function() {
        $('.popup-map-parking').modal('show');
    });
});


function initMap() {
    var myLatLng = {lat: 46.892358, lng: -2.136774};

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        center: myLatLng
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Hello World!'
    });
}
