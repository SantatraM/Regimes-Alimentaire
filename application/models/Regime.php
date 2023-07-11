<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regime extends CI_Model {

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

	public function getAllObjectif() {
        $sql="select*from objectif";
        $query=$this -> db -> query($sql);
        $resultat=array();
        foreach($query->result_array() as $row) {
            $resultat[]=$row;
        }
        return $resultat;
    }

    public function getAllMenu() {
        $sql="select*from menu";
        $query=$this -> db -> query($sql);
        $resultat=array();
        foreach($query->result_array() as $row) {
            $resultat[]=$row;
        }
        return $resultat;
    }

    public function newRegimeTable($nom_regime, $prix_regime, $id_objectif, $poid) {
        $sql="insert into regime values(default, '%s', '%s', '%s', '%s', null)";
        $sql=sprintf($sql, $nom_regime, $prix_regime, $id_objectif, $poid);
        $this -> db -> query($sql);
    }

    public function nouveauSport($nom_sport, $id_objectif, $poid, $image) {
        $sql="insert into activite_sportive values(default, '%s', '%s', '%s', null, '%s')";
        $sql=sprintf($sql, $nom_sport, $id_objectif, $poid, $image);
        $this -> db -> query($sql);
    }

    public function getLastRegime() {
        $sql="select*from v_last_regime";
        $query=$this -> db -> query($sql);
        $resultat=array();
        foreach($query->result_array() as $row) {
            $resultat=$row;
        }
        return $resultat;
    }

    public function nouveauRegime($nom_regime, $prix_regime, $id_menu, $id_objectif, $poid) {
        if(count($id_menu)!=7) {
            throw new Exception("Il n'y a pas assez ou trop de menus selectionnes");
        }
        $this -> newRegimeTable($nom_regime, $prix_regime, $id_objectif, $poid);
        $v_last_regime=$this -> getLastRegime();
        for($i=0; $i<count($id_menu); $i++) {
            $sql="insert into regime_menu values(default, '%s', '%s')";
            $sql=sprintf($sql, $id_menu[$i], $v_last_regime['id_regime']);
            $this -> db -> query($sql);
        }
    }

    public function getAllRegime() {
        $sql="select*from v_regime_objectif";
        $query=$this -> db -> query($sql);
        $resultat=array();
        foreach($query->result_array() as $row) {
            $resultat[]=$row;
        }
        return $resultat;
    }

    public function getAllSport() {
        $sql="select*from v_sport_objectif";
        $query=$this -> db -> query($sql);
        $resultat=array();
        foreach($query->result_array() as $row) {
            $resultat[]=$row;
        }
        return $resultat;
    }

    public function getMenuOfRegime($id_regime) {
        $sql="select*from v_regime_menu where id_regime='".$id_regime."'";
        $query=$this -> db -> query($sql);
        $resultat=array();
        foreach($query->result_array() as $row) {
            $resultat[]=$row;
        }
        return $resultat;
    }

    public function getCorrespondingRegime($id_regime) {
        $sql="select*from v_regime_objectif where id_regime='".$id_regime."'";
        $query=$this -> db -> query($sql);
        $resultat=array();
        foreach($query->result_array() as $row) {
            $resultat=$row;
        }
        return $resultat;
    }

    public function supprimerRegime($id_regime) {
        $sql="update regime set date_suppression=now() where id_regime='".$id_regime."'";
        $this -> db -> query($sql);
    }

    public function supprimerSport($id_sport) {
        $sql="update activite_sportive set date_suppression=now() where id_activite_sportive='".$id_sport."'";
        $this -> db -> query($sql);
    }
}
