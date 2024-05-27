<?php
header('Content-Type: application/json');
require '../db/dbPgConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Event.class.php';
require '../classes/EventDB.class.php';
$cnx = Connexion::getInstance($dsn, $user, $password);

$cl = new EventDB($cnx);
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$data = $cl->deleteEvent($id);
print json_encode($data);