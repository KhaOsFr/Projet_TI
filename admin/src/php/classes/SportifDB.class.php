<?php

class SportifDB
{
    private $_bd;
    private $_array = array();

    public function __construct($cnx)
    {
        $this->_bd = $cnx;
    }

    public function getSportifByDisc($disc)
    {
        try {
            $query = "select * from vue_sportif_disc_pays where discipline = :disc order by pays";
            $res = $this->_bd->prepare($query);
            $res->bindValue(':disc', $disc);
            $res->execute();
            $data = $res->fetch();
            return $data;
        } catch (PDOException $e) {
            print "Echec " . $e->getMessage();
        }
    }

    public function getAllSportifs()
    {
        try {
            $query = "select * from vue_sportif_disc_pays";
            $res = $this->_bd->prepare($query);
            $res->execute();
            $data = $res->fetchAll();
            if (!empty($data)) {
                foreach ($data as $d) {
                    $_array[] = new Sportif($d);
                }
                return $_array;
            } else {
                return null;
            }

            return $data;
        } catch (PDOException $e) {
            print "Echec " . $e->getMessage();
        }
    }

    public function ajout_sportif($nom, $prenom, $age, $pays, $img, $event)
    {
        try {
            $query = "select ajout_sportif(:nom,:prenom,:age,:pays,:img,:event)";
            $res = $this->_bd->prepare($query);
            $res->bindValue(':nom', $nom);
            $res->bindValue(':prenom', $prenom);
            $res->bindValue(':age', $age);
            $res->bindValue(':pays', $pays);
            $res->bindValue(':img', $img);
            $res->bindValue(':event', $event);
            $res->execute();
            $data = $res->fetch();
            return $data;
        } catch (PDOException $e) {
            print "Echec " . $e->getMessage();
        }
    }

    public function getSportifsByEvent($ide)
    {
        try {
            $query = "select * from vue_sportif_disc_pays where id_event = ide";
            $res = $this->_bd->prepare($query);
            $res->execute();
            $data = $res->fetchAll();
            if (!empty($data)) {
                foreach ($data as $d) {
                    $_array[] = new Sportif($d);
                }
                return $_array;
            } else {
                return null;
            }

            return $data;
        } catch (PDOException $e) {
            print "Echec " . $e->getMessage();
        }
    }
}