<?php 
    if(! defined('BASEPATH')) exit('No direct script access allowed');
    class Code_model extends CI_Model {


        public function Save_Code($code,$montant) {
            $data = array(
                'numero' => $code,
                'montant' => $montant
            );
            $this->db->insert('code',$data);
        }

        public function getCode() {
            $sql="SELECT * FROM code where date_supression is null";
            $query = $this->db->query($sql);
            $resultat = $query->result_array();
            return $resultat;
        }

        public function getAllCode() {
            $sql="SELECT * FROM code";
            $query = $this->db->query($sql);
            $resultat = $query->result_array();
            return $resultat;
        }

        public function delete($id) {
            $sql="UPDATE code SET date_supression = now() where id_code = ?";
            $this->db->query($sql,array($id));
        }

        public function update($id,$numero,$montant) {
            $sql="UPDATE code SET numero= ? , montant= ? where id_code = ?";
            $this->db->query($sql,array($numero,$montant,$id));
        }

        public function getCodeById($id) {
            $sql= "SELECT * FROM code where id_code=?";
            $query = $this->db->query($sql,array($id));
            $result = $query->row_array();
            return $result;
        }
    }
?>