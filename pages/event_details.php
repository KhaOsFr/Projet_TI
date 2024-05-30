<?php
if (isset($_GET['id'])) {
    $id_event = intval($_GET['id']);
}
$sportifs = new SportifDB($cnx);
$liste = $sportifs->getSportifsByEvent($id_event);
$nbr = count($liste);

$event = new EventDB($cnx);
$nom = $event->getNomEvent($id_event);

if ($nbr == 0) {
    print "<br>Aucun sportif enregistré<br>";
} else {
?>
<div class="page">
    <h2 class="titre">Sportifs participant à <?= $nom ?></h2>
    <table class="table table-dark table-hover" style="text-align: center; vertical-align: middle;">
        <thead>
        <tr>
            <th scope="col">Photo</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Âge</th>
            <th scope="col">Nationnalité</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <tr>
                <td id="<?= $liste[$i]->id_sportif; ?>" name="img"><img
                            src="admin/public/images/<?= $liste[$i]->img_s; ?>" height="90px"></td>
                <td id="<?= $liste[$i]->id_sportif; ?>"
                    name="nom"><?= $liste[$i]->nom; ?></td>
                <td id="<?= $liste[$i]->id_sportif; ?>"
                    name="prenom"><?= $liste[$i]->prenom; ?></td>
                <td id="<?= $liste[$i]->id_sportif; ?>"
                    name="age"><?= $liste[$i]->age; ?></td>
                <td id="<?= $liste[$i]->id_sportif; ?>" name="pays"><?= $liste[$i]->pays; ?>
                    <br><br>
                    <img src="admin/public/images/<?= $liste[$i]->img_p; ?>" height="30px" alt="pays"></td>
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