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
});