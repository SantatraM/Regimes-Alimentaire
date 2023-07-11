<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class General_model extends CI_Model {

    public function getdata($email, $mdp){
        $sql="select * from utilisateur where email_utilisateur='%s' and mot_de_passe='%s'";
        $sql=sprintf($sql, $email, $mdp);
        $query = $this->db->query($sql);
        $tab = array();
        foreach($query->result_array() as $row){
            $tab['id_utilisateur'] = $row['id_utilisateur'];
            $tab['prenoms_utilisateur'] = $row['prenoms_utilisateur'];
            $tab['email_utilisateur'] = $row['email_utilisateur'];
            $tab['date_de_naissance'] = $row['date_de_naissance'];
            $tab['id_sexe'] = $row['id_sexe'];
            $tab['mot_de_passe'] = $row['mot_de_passe'];
        }
        return $tab;
    }

    
    public function insertion_utilisateur($prenoms,$email,$date_de_naissance,$sexe,$mot_de_passe) {
        $data = array(
            'prenoms_utilisateur' => $prenoms,
            'email_utilisateur' => $email,
            'date_de_naissance' => $date_de_naissance,
            'id_sexe' => $sexe,
            'mot_de_passe' => $mot_de_passe
        );
        $this->db->insert('utilisateur',$data);
    }

    public function get_sexe()
    {
        $query = "SELECT * FROM sexe";
        $sql = $this->db->query($query);
        $resultat=array();
        foreach($sql->result_array() as $row) {
            $resultat[]=$row;
        }
        return $resultat;
    }

}

