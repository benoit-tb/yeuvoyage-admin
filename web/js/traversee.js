$( document ).ready(function() {


    $('#datetimepicker1').datetimepicker({
        pickDate: false
    });

    $('.btn-modifier-horaires').click(function() {
        var idTrajet = $(this).attr('id');
        var url = Routing.generate('yeu_voyage_traversee_detail_id');

        $.ajax({
            url: url,
            type: "POST",
            data: {
                trajet_id: idTrajet
            },
            success:function(data) {
                $(".popup-modifier-horaires #update-compagnie").val(data.compagnie);
                $(".popup-modifier-horaires #update-trajet").val(data.provenance + ' > ' + data.destination);
                $(".popup-modifier-horaires #update-date").val(data.date);
                $(".popup-modifier-horaires #update-horaire").val(data.horaireOrigine);
            }
        });
        $(".popup-modifier-horaires #traversee-id").val(idTrajet);
        $('.popup-modifier-horaires').modal('show');
    });

    // Sauvegarde des nouveaux horaires
    $('.popup-modifier-horaires .btn-save-popup').click(function() {
        var idTrajet = $('.popup-modifier-horaires #traversee-id').val();
        var dateDepart = $('.popup-modifier-horaires #update-date').val();
        var horaireDepart = $('.popup-modifier-horaires #update-horaire').val();
        var url = Routing.generate('yeu_voyage_traversee_sauvegarder_nouveau_horaire');

        $.ajax({
            url: url,
            type: "POST",
            data: {
                trajet_id: idTrajet,
                nouveau_horaire: dateDepart + ' ' + horaireDepart
            },
            success:function(data) {
                location.reload(true);
            }
        });

        $('.popup-modifier-horaires').modal('hide');
    });


    $('.btn-annulation-traversee').click(function() {
        var idTrajet = $(this).attr('id');
        $(".popup-confirm-annulation #traversee-id").val(idTrajet);
        $('.popup-confirm-annulation').modal('show');
    });

    $('.popup-confirm-annulation .btn-save-popup').click(function() {
        var idTrajet = $('.popup-confirm-annulation #traversee-id').val();
        var url = Routing.generate('yeu_voyage_traversee_annuler');

        $.ajax({
            url: url,
            type: "POST",
            data: {
                trajet_id: idTrajet
            },
            success:function(data) {
                location.reload(true);
            }
        });

        $('.popup-confirm-annulation').modal('hide');
    });


    // Activation des horaires facultatifs
    $('.btn-activer-horaire-facultatif').click(function() {
        var idTrajet = $(this).attr('id');
        $(".popup-confirm-activation-horaire #traversee-id").val(idTrajet);
        $('.popup-confirm-activation-horaire').modal('show');
    });


    $('.popup-confirm-activation-horaire .btn-save-popup').click(function() {
        var idTrajet = $('.popup-confirm-activation-horaire #traversee-id').val();
        var url = Routing.generate('yeu_voyage_traversee_activation_horaire_facultatif');

        $.ajax({
            url: url,
            type: "POST",
            data: {
                trajet_id: idTrajet
            },
            success:function(data) {
                location.reload(true);
            }
        });

        $('.popup-confirm-activation-horaire').modal('hide');
    });

    // Suppression des horaires supplémentaires
    $('.btn-supprimer-horaire-supplementaire').click(function() {
        var idTrajet = $(this).attr('id');
        $(".popup-confirm-suppression #traversee-id").val(idTrajet);
        $('.popup-confirm-suppression').modal('show');
    });


    $('.popup-confirm-suppression .btn-save-popup').click(function() {
        var idTrajet = $('.popup-confirm-suppression #traversee-id').val();
        var url = Routing.generate('yeu_voyage_traversee_suppression_horaire_supplementaire');

        $.ajax({
            url: url,
            type: "POST",
            data: {
                trajet_id: idTrajet
            },
            success:function(data) {
                location.reload(true);
            }
        });

        $('.popup-confirm-suppression').modal('hide');
    });


    // Retablir horaire d'origine d'un trajet
    $('.btn-retablir-horaires').click(function() {
        var idTrajet = $(this).attr('id');
        $(".popup-confirm-retablir-horaire #traversee-id").val(idTrajet);
        $('.popup-confirm-retablir-horaire').modal('show');
    });
    $('.popup-confirm-retablir-horaire .btn-save-popup').click(function() {
        var idTrajet = $('.popup-confirm-retablir-horaire #traversee-id').val();
        var url = Routing.generate('yeu_voyage_traversee_retablir_horaire_modifie');

        $.ajax({
            url: url,
            type: "POST",
            data: {
                trajet_id: idTrajet
            },
            success:function(data) {
                location.reload(true);
            }
        });

        $('.popup-confirm-retablir-horaire').modal('hide');
    });


    // Retablir trajet annulé
    $('.btn-retablir-trajet').click(function() {
        var idTrajet = $(this).attr('id');
        $(".popup-confirm-retablir-trajet #traversee-id").val(idTrajet);
        $('.popup-confirm-retablir-trajet').modal('show');
    });

    $('.popup-confirm-retablir-trajet .btn-save-popup').click(function() {
        var idTrajet = $('.popup-confirm-retablir-trajet #traversee-id').val();
        var url = Routing.generate('yeu_voyage_traversee_retablir_trajet');

        $.ajax({
            url: url,
            type: "POST",
            data: {
                trajet_id: idTrajet
            },
            success:function(data) {
                location.reload(true);
            }
        });

        $('.popup-confirm-retablir-trajet').modal('hide');
    });
});