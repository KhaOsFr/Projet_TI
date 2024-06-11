<?php
$events = new EventDB($cnx);
$liste = $events->getAllEventsView();
$nbr = count($liste);

if ($nbr == 0) {
    print "<br>Aucun événement enregistré<br>";
} else {
    ?>

    <div class="page accueil">
        <h2 class="titre">Bienvenue sur notre site d'événements sportifs<br><br></h2>
        <div id="carouselExampleAutoplaying" class="carousel slide carousel-dark carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                for ($i = 0; $i < $nbr; $i++) {
                    $active = $i == 0 ? 'active' : '';
                    ?>
                    <div class="carousel-item <?= $active ?>">
                        <img src="admin/public/images/<?= $liste[$i]->img_e; ?>" class="d-block w-100" alt="...">
                    </div>
                    <?php
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <?php
}
?>