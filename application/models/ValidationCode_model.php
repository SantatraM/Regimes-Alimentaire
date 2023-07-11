<?php 
    if(! defined('BASEPATH')) exit('No direct script access allowed');
    class ValidationCode_model extends CI_Model {

        public function getPorte_monaie() {
            $query = "SELECT * from v_porte_monaie";
            $sql = $this->db->query($query);
            $resultat=array();
            foreach($sql->result_array() as $row) {
                $resultat[]=$row;
            }
            return $resultat;
        }
       
        public function valide_code($etat,$code) {
            $sql = "UPDATE porte_monaie set etat=? where code=?";
            $this->db->query($sql,array($etat,$code));
        }

        public function update_etat_code($etat,$code) {
            $sql = "UPDATE code set etat=?,date_supression=now() where id_code=?";
            $this->db->query($sql,array($etat,$code));
        }

        public function insert_caisse($user,$code) {
            $data = array(
                'id_utilisateur' => $user,
                'id_code' => $code,
                'quantite_moins' => 0,
                'date_transaction' => date('Y-m-d')
            );
            $this->db->insert('caisse',$data);
        }
    }
?>