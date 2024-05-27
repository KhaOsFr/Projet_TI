<?php

class EventDB
{
    private $_bd;
    private $_array = array();

    public function __construct($cnx)
    {
        $this->_bd = $cnx;
    }

    public function getAllEventsView()
    {
        try {
            $query = "select * from vue_event_disc_pays order by nom";
            $res = $this->_bd->prepare($query);
            $res->execute();
            $data = $res->fetchAll();
            if (!empty($data)) {
                foreach ($data as $d) {
                    $_array[] = new Event($d);
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

    public function getAllEvents()
    {
        try {
            $query = "select * from event";
            $res = $this->_bd->prepare($query);
            $res->execute();
            $data = $res->fetchAll();
            if (!empty($data)) {
                foreach ($data as $d) {
                    $_array[] = new Event($d);
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

    public function ajout_event($nom, $desc, $dated, $datef, $disc, $pays, $img)
    {
        try {
            $query = "select ajout_event(:nom,:desc,:dated,:datef,:disc,:pays,:img)";
            $res = $this->_bd->prepare($query);
            $res->bindValue(':nom', $nom);
            $res->bindValue(':desc', $desc);
            $res->bindValue(':dated', $dated);
            $res->bindValue(':datef', $datef);
            $res->bindValue(':disc', $disc);
            $res->bindValue(':pays', $pays);
            $res->bindValue(':img', $img);
            $res->execute();
            $data = $res->fetch();
            return $data;
        } catch (PDOException $e) {
            print "Echec " . $e->getMessage();
        }
    }

    public function update_event($id, $nom, $desc, $dated, $datef, $disc, $pays, $img)
    {
        try {
            $query = "select update_event(:id,:nom,:desc,:dated,:datef,:disc,:pays,:img)";
            $res = $this->_bd->prepare($query);
            $res->bindValue(':id', $id);
            $res->bindValue(':nom', $nom);
            $res->bindValue(':desc', $desc);
            $res->bindValue(':dated', $dated);
            $res->bindValue(':datef', $datef);
            $res->bindValue(':disc', $disc);
            $res->bindValue(':pays', $pays);
            $res->bindValue(':img', $img);
            $res->execute();
            $data = $res->fetch();
            return $data;
        } catch (PDOException $e) {
            print "Echec " . $e->getMessage();
        }
    }

    public function deleteEvent($id)
    {
        try {
            $query = "select delete_event(:id)";
            $res = $this->_bd->prepare($query);
            $res->bindValue(':id', $id);
            $res->execute();
            $data = $res->fetch();
            return $data;
        } catch (PDOException $e) {
            print "Echec " . $e->getMessage();
        }
    }

    public function getEventById($id)
    {
        try {
            $query = "select * from event where id_event = :id";
            $res = $this->_bd->prepare($query);
            $res->bindValue(':id',$id);
            $res->execute();
            $data = $res->fetchAll();
            if (!empty($data)) {
                foreach ($data as $d) {
                    $_array[] = new Event($d);
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