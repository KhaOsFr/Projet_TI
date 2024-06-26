<?php
$paysDB = new PaysDB($cnx);
$pays = $paysDB->getAllPays();
$eventDB = new EventDB($cnx);
$event = $eventDB->getAllEvents();
?>

<div class="page">
    <h2 class="titre">Ajout d'un sportif</h2>
    <div class="container">
        <form id="form_ajout" method="get" action="">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>
            <div class="mb-3">
                <label for="pays" class="form-label">Pays</label>
                <select name="pays" id="pays" class="form-control" required>
                    <option value="">Choix</option>
                    <?php foreach ($pays as $p): ?>
                        <option value="<?= $p->id_pays ?>"><?= $p->pays ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <input type="text" class="form-control" id="img" name="img" placeholder="URL de l'image">
            </div>
            <div class="mb-3">
                <label for="event" class="form-label">Evénement</label>
                <select name="event" id="event" class="form-control" required>
                    <option value="">Choix</option>
                    <?php foreach ($event as $e): ?>
                        <option value="<?= $e->id_event ?>"><?= $e->nom ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" id="texte_bouton_submit_sportif" class="btn btn-primary">
                Ajouter
            </button>
            <button class="btn btn-primary" type="reset" id="reset">Annuler</button>
        </form>
    </div>
</div>