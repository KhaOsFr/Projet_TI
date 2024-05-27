<?php
if (isset($_GET['id'])) {
    $id_event = intval($_GET['id']);
}

$eventDB = new EventDB($cnx);
$event = $eventDB->getEventById($id_event);
$paysDB = new PaysDB($cnx);
$pays = $paysDB->getAllPays();
$discDB = new DisciplineDB($cnx);
$disc = $discDB->getAllDisc();
?>

<div class="page">
    <h2>Modification d'un événement</h2>
    <div class="container">
        <form id="form_ajout" method="get" action="">
            <div class="mb-3">
                <input type="hidden" id="id" name="id" value="<?= $event[0]->id_event ?>">
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?= $event[0]->nom ?>" required>
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <input type="text" class="form-control" id="desc" name="desc" value="<?= $event[0]->description ?>"
                       required>
            </div>
            <div class="mb-3">
                <label for="dated" class="form-label">Date de début</label>
                <input type="date" class="form-control" id="dated" name="dated" value="<?= $event[0]->date_debut ?>"
                       required>
            </div>
            <div class="mb-3">
                <label for="datef" class="form-label">Date de fin</label>
                <input type="date" class="form-control" id="datef" name="datef" value="<?= $event[0]->date_fin ?>"
                       required>
            </div>
            <div class="mb-3">
                <label for="disc" class="form-label">Discipline</label>
                <select name="disc" id="disc" class="form-control" required>
                    <option value="" class="choix">Choix</option>
                    <?php foreach ($disc as $d): ?>
                        <?php $select = ($d->id_disc == $event[0]->id_disc) ? "selected" : ""; ?>
                        <option value="<?= $d->id_disc ?>" <?= $select ?> ><?= $d->nom ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="pays" class="form-label">Pays</label>
                <select name="pays" id="pays" class="form-control" required>
                    <option value="" class="choix">Choix</option>
                    <?php foreach ($pays as $p): ?>
                        <?php $select = ($p->id_pays == $event[0]->id_pays) ? "selected" : ""; ?>
                        <option value="<?= $p->id_pays ?>" <?= $select ?> ><?= $p->pays ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <input type="text" class="form-control" id="img" name="img" placeholder="URL de l'image"
                       value="<?= $event[0]->img ?>">
            </div>
            <button type="submit" id="texte_bouton_submit_event_update" class="btn btn-primary">
                Modifier
            </button>
        </form>
    </div>
</div>