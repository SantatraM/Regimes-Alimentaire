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

    public function getCorrespondingPlanning($id_planning) {
        $sql="select*from planning where id_planning='".$id_planning."'";
        $query=$this -> db -> query($sql);
        $resultat=array();
        foreach($query->result_array() as $row) {
            $resultat=$row;
        }
        return $resultat;
    }

    public function getLastPlanning() {
        $sql="select*from planning where id_planning=(select max(id_planning) from planning)";
        $query=$this -> db -> query($sql);
        $resultat=array();
        foreach($query->result_array() as $row) {
            $resultat=$row;
        }
        return $resultat;
    }

    public function getPropositionRegime($id_planning) {
        $planning=$this -> getCorrespondingPlanning($id_planning);
        $sql="select v_regime_objectif.* from v_regime_objectif where id_objectif='".$planning['id_objectif']."' order by poid desc";
        $query=$this -> db -> query($sql);
        $resultat=array();
        $i=0;
        foreach($query->result_array() as $row) {
            $resultat[$i]=$row;
            $resultat[$i]['nbSemaine']=ceil($planning['poids_demander']/$row['poid']);
            $resultat[$i]['prix_total']=$resultat[$i]['prix']*$resultat[$i]['nbSemaine'];
            $resultat[$i]['id_planning']=$planning['id_planning'];
            $i++;
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

    public function newPlanning($id_user, $id_objectif, $poids_demander, $date_debut) {
        $sql="insert into planning values(default, '%s', '%s', '%s', '%s', null)";
        $sql=sprintf($sql, $id_user, $id_objectif, $poids_demander, $date_debut);
        $this -> db -> query($sql);
    }

    public function getAllPlanning($id_user) {
        $sql="select*from v_planning_objectif where id_utilisateurs='".$id_user."'";
        $query=$this -> db -> query($sql);
        $resultat=array();
        foreach($query->result_array() as $row) {
            $resultat[]=$row;
        }
        return $resultat;
    }

    public function getCaisseOfClient($id_user) {
        $sql="select*from v_caisse_actuel_client where id_utilisateur='".$id_user."'";
        $query=$this -> db -> query($sql);
        $resultat=array();
        foreach($query->result_array() as $row) {
            $resultat=$row;
        }
        return $resultat;
    }

    public function aAssezDArgent($id_user, $prix) {
        $caisse=$this -> getCaisseOfClient($id_user);
        return $prix<$caisse['caisse'];
    }

    public function updateIdRegimePlanning($id_regime, $id_planning) {
        $sql="update planning set id_regime='%s' where id_planning='%s'";
        $sql=sprintf($sql, $id_regime, $id_planning);
        $query=$this -> db -> query($sql);
    }

    public function quantite_en_moins($id_user, $id_regime, $id_planning) {
        $sql="insert into caisse values(default, '%s', null, '%s', now())";
        $planning=$this -> getCorrespondingPlanning($id_planning);
        $regime=$this -> getCorrespondingRegime($id_regime);
        $nbSemaine=ceil($regime['poid']/$planning['poids_demander']);
        $prix=$nbSemaine*$regime['prix'];
        if($this -> aAssezDArgent($id_user, $prix)) {
            $sql=sprintf($sql, $id_user, $prix);
            $this -> db -> query($sql);
        } else {
            throw new Exception("Vous n'avez pas assez d'argent");
        }
    }

    public function souscrire($id_user, $id_regime, $id_planning) {
        try {
            $this -> quantite_en_moins($id_user, $id_regime, $id_planning);
            $this -> updateIdRegimePlanning($id_regime, $id_planning);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
