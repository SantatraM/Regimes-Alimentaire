<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Client extends CI_Controller 
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Regime');
        if($this -> session -> userdata("client")) {
            
        } else if($this -> session -> userdata("admin")) {
            redirect("Admin/liste_regime");
        } else {
            redirect("General");
        }
    }
	public function index()
	{
        $this->load->model('CodeClient_model');
        $data['code'] = $this->CodeClient_model->getCode();
        $data['css'] = "client.css";
        $this -> load -> view("header", $data);
        $this->load->view('Client',$data);
        $this -> load -> view("footer");
	}	

    public function save() { //save porte_monaie
        $this->load->model('CodeClient_model');
        $user = null;
        $code = $this->input->post('numero');
        $id_code = $this->CodeClient_model->getIdCode($code);
        $this->CodeClient_model->insert_porte_monaie($user,$id_code);
        redirect('Client/index');
    }
    
    public function objectifs()
    {
        $this->load->model('General_model');
        $data['objectif']=$this->General_model->get_objectifs();
        $data['css']='Formulaire_objectif.css';
        $this -> load -> view('header', $data);
        $this->load->view('Formulaire_objectif',$data);
        $this -> load -> view('footer');
    }

    public function proposition_regime() {
        $id_planning=$this -> input -> get("id_planning");
        $data['css']='Formulaire_objectif.css';
        $data['regime']=$this -> Regime -> getPropositionRegime($id_planning);
        $this -> load -> view('header', $data);
        $this->load->view('liste_proposition',$data);
        $this -> load -> view('footer');
    }

    public function insertPlanning() {
        $id_user=$this -> session -> userdata("client")['id_utilisateur'];
        $id_objectif=$this -> input -> post("id_objectif");
        $poids_demander=$this -> input -> post("poids_demander");
        $date_debut=$this -> input -> post("date_debut");
        $this -> Regime -> newPlanning($id_user, $id_objectif, $poids_demander, $date_debut);
        $last_planning = $this -> Regime -> getLastPlanning();
        redirect("Client/proposition_regime?id_planning=".$last_planning['id_planning']);
    }

    public function showAllPlanning() {
        $id_user=$this -> session -> userdata("client")['id_utilisateur'];
        $data['planning'] = $this -> Regime -> getAllPlanning($id_user);
        $data['css']='liste_proposition.css';
        $this -> load -> view('header', $data);
        $this -> load -> view("liste_planning", $data);
        $this -> load -> view("footer");
    }
    
    public function souscrire() {
        $id_regime=$this -> input -> get("id_regime");
        $id_planning=$this -> input -> get("id_planning");
        $id_user=$this -> session -> userdata("client")['id_utilisateur'];
        try {
            $this -> Regime -> souscrire($id_user, $id_regime, $id_planning);
            redirect("Client/proposition_regime?id_planning=".$id_planning);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

	
    
	
