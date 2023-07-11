<?php 
    if(! defined('BASEPATH')) exit('No direct script access allowed');
class CodeClient_model extends CI_Model {


        public function getCode() {
            $sql="SELECT * FROM code where date_supression is null";
            $query = $this->db->query($sql);
            $resultat = $query->result_array();
            return $resultat;
        }

        public function insert_porte_monaie($user,$code) {
            $data = array(
                'user_id' => $user,
                'code' => $code
            );
            $this->db->insert('porte_monaie',$data);
        }

        public function getIdCode($code) {
            $sql = "SELECT id_code FROM code WHERE numero=?";
            $query = $this->db->query($sql, array($code));
            $row = $query->row();
            if ($row) {
                return $row->id_code;
            } else {
                return null;
            }
        } 

        public function getporte_monaie () {
            $sql = "SELECT * from v_porte_monaie";
            $query = $this->db->query($sql);
            $resultat = $query->result_array();
            return $resultat;
        }

    }
?>