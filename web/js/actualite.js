$( document ).ready(function() {

    // Suppression des actualites
    $('.btn-suppression-actualite').click(function() {
        var idActualite = $(this).attr('id');
        $(".popup-confirm-suppression #actualite-id").val(idActualite);
        $('.popup-confirm-suppression').modal('show');
    });

    // Suppression actualite
    $('.popup-confirm-suppression .btn-save-popup').click(function() {
        var idActualite = $('.popup-confirm-suppression #actualite-id').val();
        var url = Routing.generate('yeu_voyage_actualite_supprimer');

        $.ajax({
            url: url,
            type: "POST",
            data: {
                actualite_id: idActualite
            },
            success:function(data) {
                location.reload(true);
            }
        });

        $('.popup-confirm-suppression').modal('hide');
    });

    // Modification des actualites
    $('.btn-modification-actualite').click(function() {
        var idActualite = $(this).attr('id');
        var url = Routing.generate('yeu_voyage_actualite_detail');

        $.ajax({
            url: url,
            type: "POST",
            data: {
                actualite_id: idActualite
            },
            success:function(data) {
                $(".popup-modification-actualite #update-titre").val(data.titre);
                $(".popup-modification-actualite #update-commentaire").val(data.commentaire);
                $(".popup-modification-actualite #update-start-date").val(data.start_date);
                $(".popup-modification-actualite #update-end-date").val(data.end_date);
                $(".popup-modification-actualite #update-afficher-accueil").val(data.afficher_accueil);
                $(".popup-modification-actualite #update-type").val(data.type);
            }
        });
        $(".popup-modification-actualite #actualite-id").val(idActualite);
        $('.popup-modification-actualite').modal('show');
    });

});