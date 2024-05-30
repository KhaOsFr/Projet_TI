<?php
$paysDB = new PaysDB($cnx);
$pays = $paysDB->getAllPays();
$discDB = new DisciplineDB($cnx);
$disc = $discDB->getAllDisc();
?>

<div class="page">
    <h2 class="titre">Ajout d'un événement</h2>
    <div class="container">
        <form id="form_ajout" method="get" action="">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <input type="text" class="form-control" id="desc" name="desc" required>
            </div>
            <div class="mb-3">
                <label for="dated" class="form-label">Date de début</label>
                <input type="date" class="form-control" id="dated" name="dated" required>
            </div>
            <div class="mb-3">
                <label for="datef" class="form-label">Date de fin</label>
                <input type="date" class="form-control" id="datef" name="datef" required>
            </div>
            <div class="mb-3">
                <label for="disc" class="form-label">Discipline</label>
                <select name="disc" id="disc" class="form-control" required>
                    <option value="">Choix</option>
                    <?php foreach ($disc as $d): ?>
                        <option value="<?= $d->id_disc ?>"><?= $d->nom ?></option>
                    <?php endforeach; ?>
                </select>
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
            <button type="submit" id="texte_bouton_submit_event" class="btn btn-primary">
                Ajouter
            </button>
            <button class="btn btn-primary" type="reset" id="reset">Annuler</button>
        </form>
    </div>
</div>