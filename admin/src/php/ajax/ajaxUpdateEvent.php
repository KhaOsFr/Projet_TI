<?php
header('Content-Type: application/json');
require '../db/dbPgConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Event.class.php';
require '../classes/EventDB.class.php';
$cnx = Connexion::getInstance($dsn, $user, $password);

$sp = new EventDB($cnx);
$data[] = $sp->update_event($_GET['id'], $_GET['nom'], $_GET['desc'], $_GET['dated'], $_GET['datef'], $_GET['disc'], $_GET['pays'], $_GET['img']);
print json_encode($data);