<?php
header('Content-Type: application/json');
require '../db/dbPgConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Sportif.class.php';
require '../classes/SportifDB.class.php';
$cnx = Connexion::getInstance($dsn, $user, $password);

$cl = new SportifDB($cnx);
$data[] = $cl->updateSportif($_GET['id'], $_GET['name'], $_GET['valeur']);
print json_encode($data);