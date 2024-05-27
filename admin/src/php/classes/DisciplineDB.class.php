<?php

class DisciplineDB
{
    private $_bd;
    private $_array = array();

    public function __construct($cnx)
    {
        $this->_bd = $cnx;
    }

    public function getAllDisc(){
        try{
            $query="select * from discipline order by nom";
            $res = $this->_bd->prepare($query);
            $res->execute();
            $data = $res->fetchAll();
            if(!empty($data))  {
                foreach($data as $d) {
                    $_array[] = new Discipline($d);
                }
                return $_array;
            }
            else{
                return null;
            }

            return $data;
        }catch(PDOException $e){
            print "Echec ".$e->getMessage();
        }
    }
}