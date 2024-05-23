<h2>Gestion des sportifs</h2>

<?php
$sportifs = new SportifDB($cnx);
$liste = $sportifs->getAllSportifs();
$nbr = count($liste);

if ($nbr == 0) {
    print "<br>Aucun sportif enregistré<br>";
} else {
    ?>
    <a href="index_.php?page=ajout_sportif.php" class="btn btn-primary" style="float:right;margin-bottom: 20px">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add"
             viewBox="0 0 16 16">
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
        </svg>
        Ajouter
    </a>
    <table class="table table-striped">
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
                <td contenteditable="false" id="<?= $liste[$i]->id_sportif; ?>" name="img"><img
                            src="public/images/<?= $liste[$i]->img_s; ?>" height="90px"></td>
                <td contenteditable="true" id="<?= $liste[$i]->id_sportif; ?>"
                    name="nom_sportif"><?= $liste[$i]->nom; ?></td>
                <td contenteditable="true" id="<?= $liste[$i]->id_sportif; ?>"
                    name="prenom_sportif"><?= $liste[$i]->prenom; ?></td>
                <td contenteditable="true" id="<?= $liste[$i]->id_sportif; ?>" name="age"><?= $liste[$i]->age; ?></td>
                <td contenteditable="false" id="<?= $liste[$i]->id_sportif; ?>" name="nation"><?= $liste[$i]->pays; ?>
                <br><br>
                <img src="public/images/<?= $liste[$i]->img_p; ?>" height="30px"></td>
                <td contenteditable="true" id="<?= $liste[$i]->id_sportif; ?>"
                    name="disc"><?= $liste[$i]->discipline; ?></td>
                <td>
                    <a href="" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                        </svg>
                    </a>
                    <a href="" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                        </svg>
                    </a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
}