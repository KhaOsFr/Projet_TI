$(document).ready(function () {


    $('#texte_bouton_submit_sportif').click(function (e) {
        e.preventDefault();
        let nom = $('#nom').val();
        let prenom = $('#prenom').val();
        let age = $('#age').val();
        let pays = $('#pays').val();
        let img = $('#img').val();
        let event = $('#event').val();
        let param = 'nom=' + nom + '&prenom=' + prenom + '&age=' + age + '&pays=' + pays + '&img=' + img + '&event=' + event;
        let retour = $.ajax({
            type: 'get',
            dataType: 'json',
            data: param,
            url: './src/php/ajax/ajaxAjoutSportif.php',
            success: function (data) {
                console.log(data);
                window.location.href = 'index_.php?page=gestion_sportifs.php';
            }
        })
    });

    $('#texte_bouton_submit_sportif_update').click(function (e) {
        e.preventDefault();
        let id = $('#id').val();
        let nom = $('#nom').val();
        let prenom = $('#prenom').val();
        let age = $('#age').val();
        let pays = $('#pays').val();
        let img = $('#img').val();
        let event = $('#event').val();
        let param = 'id=' + id + '&nom=' + nom + '&prenom=' + prenom + '&age=' + age + '&pays=' + pays + '&img=' + img + '&event=' + event;
        let retour = $.ajax({
            type: 'get',
            dataType: 'json',
            data: param,
            url: './src/php/ajax/ajaxUpdateSportif.php',
            success: function (data) {
                console.log(data);
                window.location.href = 'index_.php?page=gestion_sportifs.php';
            }
        })
    });

    $('.delete_sportif').click(function (e) {
        e.preventDefault();
        if (confirm('Êtes-vous sûr de vouloir supprimer ce sportif ?')) {
            let id = $(this).data('id');
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: './src/php/ajax/ajaxDeleteSportif.php',
                data: {id: id},
                success: function (response) {
                    window.location.href = 'index_.php?page=gestion_sportifs.php';
                },
                error: function (xhr, status, error) {
                    console.log('Error:', error);
                    alert('Erreur de communication avec le serveur.');
                }
            });
        }
    });

    $('#texte_bouton_submit_event').click(function (e) {
        e.preventDefault();
        let nom = $('#nom').val();
        let desc = $('#desc').val();
        let dated = $('#dated').val();
        let datef = $('#datef').val();
        let disc = $('#disc').val();
        let pays = $('#pays').val();
        let img = $('#img').val();
        let param = 'nom=' + nom + '&desc=' + desc + '&dated=' + dated + '&datef=' + datef + '&disc=' + disc + '&pays=' + pays + '&img=' + img;
        let retour = $.ajax({
            type: 'get',
            dataType: 'json',
            data: param,
            url: './src/php/ajax/ajaxAjoutEvent.php',
            success: function (data) {
                console.log(data);
                window.location.href = 'index_.php?page=gestion_event.php';
            }
        })
    });

    $('#texte_bouton_submit_event_update').click(function (e) {
        e.preventDefault();
        let id = $('#id').val();
        let nom = $('#nom').val();
        let desc = $('#desc').val();
        let dated = $('#dated').val();
        let datef = $('#datef').val();
        let disc = $('#disc').val();
        let pays = $('#pays').val();
        let img = $('#img').val();
        let param = 'id=' + id + '&nom=' + nom + '&desc=' + desc + '&dated=' + dated + '&datef=' + datef + '&disc=' + disc + '&pays=' + pays + '&img=' + img;
        let retour = $.ajax({
            type: 'get',
            dataType: 'json',
            data: param,
            url: './src/php/ajax/ajaxUpdateEvent.php',
            success: function (data) {
                console.log(data);
                window.location.href = 'index_.php?page=gestion_event.php';
            }
        })
    });

    $('.delete_event').click(function (e) {
        e.preventDefault();
        if (confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')) {
            let id = $(this).data('id');
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: './src/php/ajax/ajaxDeleteEvent.php',
                data: {id: id},
                success: function (response) {
                    window.location.href = 'index_.php?page=gestion_event.php';
                },
                error: function (xhr, status, error) {
                    console.log('Error:', error);
                    alert('Erreur de communication avec le serveur.');
                }
            });
        }
    });
});