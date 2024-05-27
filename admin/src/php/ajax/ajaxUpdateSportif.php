<?php
header('Content-Type: application/json');
require '../db/dbPgConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Sportif.class.php';
require '../classes/SportifDB.class.php';
$cnx = Connexion::getInstance($dsn, $user, $password);

$sp = new SportifDB($cnx);
$data[] = $sp->update_sportif($_GET['id'], $_GET['nom'], $_GET['prenom'], $_GET['age'], $_GET['pays'], $_GET['img'], $_GET['event']);
print json_encode($data);