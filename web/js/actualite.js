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
                if(data.afficher_accueil == true) {
                    $(".popup-modification-actualite #update-afficher-accueil").attr('checked', 'checked');
                } else {
                    $(".popup-modification-actualite #update-afficher-accueil").removeAttr('checked');
                }
                $(".popup-modification-actualite #update-type option").filter(function() {
                    return $(this).text() == data.type;
                }).prop('selected', true);
            }
        });
        $(".popup-modification-actualite #actualite-id").val(idActualite);
        $('.popup-modification-actualite').modal('show');
    });

    $('.popup-modification-actualite .btn-save-popup').click(function() {
        var idActualite = $('.popup-modification-actualite #actualite-id').val();
        var titre = $(".popup-modification-actualite #update-titre").val();
        var commentaire = $(".popup-modification-actualite #update-commentaire").val();
        var startDate = $(".popup-modification-actualite #update-start-date").val();
        var endDate = $(".popup-modification-actualite #update-end-date").val();
        var afficherAccueil = $(".popup-modification-actualite #update-afficher-accueil").is(':checked');
        var typeActualite = $(".popup-modification-actualite #update-type").val()
        var url = Routing.generate('yeu_voyage_actualite_modifier');

        $.ajax({
            url: url,
            type: "POST",
            data: {
                actualite_id: idActualite,
                titre: titre,
                commentaire: commentaire,
                start_date: startDate,
                end_date: endDate,
                afficher_accueil: afficherAccueil,
                type_actualite: typeActualite
            },
            success:function(data) {
                location.reload(true);
            }
        });

        $('.popup-modification-actualite').modal('hide');
    });
});