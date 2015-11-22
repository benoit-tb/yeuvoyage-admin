$(document).ready(function() {

    $('.btn-update-contact-infos').click(function() {
        $('.popup-modification-contact-infos .form-compagnie-description').css('display', 'none');
        $('.popup-modification-contact-infos .form-compagnie-contact').css('display', 'inline');
        $('.popup-modification-contact-infos').modal('show');
    });

    $('.btn-update-description').click(function() {
        $('.popup-modification-contact-infos .form-compagnie-description').css('display', 'inline');
        $('.popup-modification-contact-infos .form-compagnie-contact').css('display', 'none');
        $('.popup-modification-contact-infos').modal('show');
    });

    $('.popup-modification-contact-infos .btn-save-popup').click(function() {
        var url = Routing.generate('yeu_voyage_compagnie_modifier');

        $.ajax({
            url: url,
            type: "POST",
            data: {
                compagnie_id: $('#compagnie-id').val(),
                description: $('#update-compagnie-description').val(),
                telephone: $('#update-compagnie-telephone').val(),
                mail: $('#update-compagnie-mail').val(),
                site_web: $('#update-compagnie-site').val()
            },
            success:function(data) {
                if(data.succes == 1){
                    location.reload(true);
                } else {
                    alert('Erreur lors de la mise à jour.')
                }
            }
        });

        $('.popup-modification-contact-infos').modal('hide');
    });

    // Pop up de confirmation de suppression des fichiers
    $('.btn-confirm-suppression-fichier').click(function() {
        var idFichier = $(this).attr('id');
        $(".popup-confirm-suppression-fichier #ressource-id").val(idFichier);
        $('.popup-confirm-suppression-fichier').modal('show');
    });

    // Suppression des fichiers
    $('.popup-confirm-suppression-fichier .btn-save-popup').click(function() {
        var idFichier = $('.popup-confirm-suppression-fichier #ressource-id').val();
        var url = Routing.generate('yeu_voyage_compagnie_fichier_supprimer');

        $.ajax({
            url: url,
            type: "POST",
            data: {
                fichier_id: idFichier
            },
            success:function(data) {
                if(data.succes == 1){
                    location.reload(true);
                } else {
                    alert('Erreur lors de la mise à jour.')
                }
            }
        });

        $('.popup-confirm-suppression-fichier').modal('hide');
    });

    // Modification des fichiers de la compagnie
    $('.btn-modification-fichier').click(function() {
        var idFichier = $(this).attr('id');
        var url = Routing.generate('yeu_voyage_compagnie_fichier_detail');

        $.ajax({
            url: url,
            type: "POST",
            data: {
                fichier_id: idFichier
            },
            success:function(data) {
                $(".popup-modification-fichier #update-fichier-nom").val(data.nom);
                $(".popup-modification-fichier #update-fichier-description").val(data.description);
                $(".popup-modification-fichier #update-fichier-url").attr('href', 'http://' + data.url);
                $(".popup-modification-fichier #ressource-id").val(idFichier);
            }
        });

        $('.popup-modification-fichier').modal('show');
    });

    // Sauvegarde de la modification des fichiers
    $('.popup-modification-fichier .btn-save-popup').click(function() {
        var idFichier = $('.popup-modification-fichier #ressource-id').val();
        var nomFichier = $('.popup-modification-fichier #update-fichier-nom').val();
        var descriptionFichier = $('.popup-modification-fichier #update-fichier-description').val();
        var url = Routing.generate('yeu_voyage_compagnie_fichier_modifier');

        $.ajax({
            url: url,
            type: "POST",
            data: {
                fichier_id: idFichier,
                nom_fichier: nomFichier,
                description_fichier: descriptionFichier
            },
            success:function(data) {
                if(data.succes == 1){
                    location.reload(true);
                } else {
                    alert('Erreur lors de la mise à jour.')
                }
            }
        });

        $('.popup-modification-fichier').modal('hide');
    });
});