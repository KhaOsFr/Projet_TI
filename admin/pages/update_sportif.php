<?php
if (isset($_GET['id'])) {
    $id_sportif = intval($_GET['id']);
}

$sportifDB = new SportifDB($cnx);
$sportif = $sportifDB->getSportifById($id_sportif);
$paysDB = new PaysDB($cnx);
$pays = $paysDB->getAllPays();
$eventDB = new EventDB($cnx);
$event = $eventDB->getAllEvents();
?>

<div class="page">
    <h2 class="titre">Modification d'un sportif</h2>
    <div class="container">
        <form id="form_ajout" method="get" action="">
            <div class="mb-3">
                <input type="hidden" id="id" name="id" value="<?= $sportif[0]->id_sportif ?>">
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?= $sportif[0]->nom ?>" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $sportif[0]->prenom ?>"
                       required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" value="<?= $sportif[0]->age ?>" required>
            </div>
            <div class="mb-3">
                <label for="pays" class="form-label">Pays</label>
                <select name="pays" id="pays" class="form-control" required>
                    <option value="">Choix</option>
                    <?php foreach ($pays as $p): ?>
                        <?php $select = ($p->id_pays == $sportif[0]->id_pays) ? "selected" : ""; ?>
                        <option value="<?= $p->id_pays ?>" <?= $select ?>><?= $p->pays ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <input type="text" class="form-control" id="img" name="img" value="<?= $sportif[0]->img ?>">
            </div>
            <div class="mb-3">
                <label for="event" class="form-label">Evénement</label>
                <select name="event" id="event" class="form-control" required>
                    <option value="">Choix</option>
                    <?php foreach ($event as $e): ?>
                        <?php $select = ($e->id_event == $sportif[0]->id_event) ? "selected" : ""; ?>
                        <option value="<?= $e->id_event ?>" <?= $select ?>><?= $e->nom ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" id="texte_bouton_submit_sportif_update" class="btn btn-primary">
                Modifier
            </button>
        </form>
    </div>
</div>