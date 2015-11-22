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
});