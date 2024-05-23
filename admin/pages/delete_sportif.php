<?php
if (isset($_GET['id'])) {
    $id_sportif = intval($_GET['id']);
}
print $id_sportif;