<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Objectifs_models extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Charger la bibliothèque de base de données
    }


    public function get_objectifs()
    {
        $query = "SELECT * FROM objectif";
        $sql = $this->db->query($query);
        $resultat=array();
        foreach($sql->result_array() as $row) {
            $resultat[]=$row;
        }
        return $resultat;
    }

    public function inserction_planning($id_objectif,$poids_demander,$date_debut) {
        $data = array (
            'id_objectif'=> $id_objectif,
            'poids_demander'=>$poids_demander,
            'date_debut'=>$date_debut
        );
        $this->db->insert('planning',$data);
    }

    public function regime($id_objectif)
    {
       
        if($id_objectif==1)
        {
        $sql = "SELECT * FROM regime where id_objectif=? order by poid desc " ;
        $query = $this->db->query($sql,array($id_objectif));
        $result=array();
        foreach($query->result_array() as $row) {
            $result[]=$row;
        }
        return $result;
        }
        else if ($id_objectif==2)
        {
            $sql = "SELECT * FROM regime where id_objectif=? order by poid asc ";
            $query = $this->db->query($sql,array($id_objectif));
            $result=array();
            foreach($query->result_array() as $row) {
                $result[]=$row;
            }
            return $result;
        }
    }

}

    
