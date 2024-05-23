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
                alert("Le sportif " + nom + " a bien été ajouté.");
            }
        })
    })
});