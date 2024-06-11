<?php
$sportifs = new SportifDB($cnx);
$liste = $sportifs->getAllSportifs();
$nbr = count($liste);

if ($nbr == 0) {
    print "<br>Aucun sportif enregistré<br>";
} else {
?>
<div class="page">
    <h2 class="titre">Gestion des sportifs</h2>
    <a href="index_.php?page=ajout_sportif.php" class="btn btn-primary btn_ajout">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
             class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
        </svg>
        Ajouter un sportif
    </a>
    <table class="table table-dark table-hover tables">
        <thead>
        <tr>
            <th scope="col">Photo</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Âge</th>
            <th scope="col">Nationnalité</th>
            <th scope="col">Discipline</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <tr>
                <td id="<?= $liste[$i]->id_sportif; ?>" name="img"><img
                            src="public/images/<?= $liste[$i]->img_s; ?>" height="90px"></td>
                <td id="<?= $liste[$i]->id_sportif; ?>"
                    name="nom"><?= $liste[$i]->nom; ?></td>
                <td id="<?= $liste[$i]->id_sportif; ?>"
                    name="prenom"><?= $liste[$i]->prenom; ?></td>
                <td id="<?= $liste[$i]->id_sportif; ?>"
                    name="age"><?= $liste[$i]->age; ?></td>
                <td id="<?= $liste[$i]->id_sportif; ?>" name="pays"><?= $liste[$i]->pays; ?>
                    <br><br>
                    <img src="public/images/<?= $liste[$i]->img_p; ?>" height="30px" alt="pays"></td>
                <td id="<?= $liste[$i]->id_sportif; ?>"
                    name="disc"><?= $liste[$i]->discipline; ?></td>
                <td>
                    <a href="index_.php?page=update_sportif.php&id=<?= $liste[$i]->id_sportif ?>"
                       class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                        </svg>
                    </a>
                    <button class="btn btn-danger delete_sportif" data-id="<?= $liste[$i]->id_sportif; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                        </svg>
                    </button>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
    }
    ?>
</div>