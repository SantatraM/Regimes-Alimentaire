<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_model extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

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

    public function getCorrespondingAdmin($email, $mdp) {
        $sql="select*from admin where email_admin='%s' and mot_de_passe_admin='%s'";
        $sql=sprintf($sql, $email, $mdp);
        $resultat=array();
        $query=$this -> db -> query($sql);
        foreach($query->result_array() as $row) {
            $resultat=$row;
        }
        return $resultat;
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
}
?>