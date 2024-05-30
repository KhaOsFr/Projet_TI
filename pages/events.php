<?php
$events = new EventDB($cnx);
$liste = $events->getAllEventsView();
$nbr = count($liste);

if ($nbr == 0) {
    print "<br>Aucun événement enregistré<br>";
} else {
?>
<div class="page">
    <h2 class="titre">Nos événements</h2>
    <table class="table table-dark table-hover" style="text-align: center; vertical-align: middle;">
        <thead>
        <tr>
            <th scope="col">Photo</th>
            <th scope="col">Evénement</th>
            <th scope="col">Début</th>
            <th scope="col">Fin</th>
            <th scope="col">Localité</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <tr>
                <td id="<?= $liste[$i]->id_event; ?>" name="img_event">
                    <a href="index_.php?page=event_details.php&id=<?= $liste[$i]->id_event; ?>">
                        <img src="admin/public/images/<?= $liste[$i]->img_e; ?>" height="250px"
                             alt="<?= $liste[$i]->nom; ?>">
                    </a>
                </td>
                <td id="<?= $liste[$i]->id_event; ?>" name="nom_event">
                    <?= $liste[$i]->nom; ?>
                </td>
                <td id="<?= $liste[$i]->id_event; ?>"
                    name="date_deb_event">
                    <?= $liste[$i]->date_debut; ?>
                </td>
                <td id="<?= $liste[$i]->id_event; ?>"
                    name="date_fin_event">
                    <?= $liste[$i]->date_fin; ?>
                </td>
                <td id="<?= $liste[$i]->id_event; ?>" name="localite">
                    <?= $liste[$i]->pays; ?><br><br>
                    <img src="admin/public/images/<?= $liste[$i]->img_p; ?>" height="30px"
                         alt="<?= $liste[$i]->nom; ?>">
                </td>
                <td id="<?= $liste[$i]->id_event; ?>" name="desc" style="max-width: 500px">
                    <?= $liste[$i]->description; ?>
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
