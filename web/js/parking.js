$( document ).ready(function() {
    initMap();
    $('.btn-map-parking').click(function() {
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
