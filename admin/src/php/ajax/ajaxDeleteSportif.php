<?php
header('Content-Type: application/json');
require '../db/dbPgConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Sportif.class.php';
require '../classes/SportifDB.class.php';
$cnx = Connexion::getInstance($dsn, $user, $password);

$cl = new SportifDB($cnx);
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$data = $cl->deleteSportif($id);
print json_encode($data);