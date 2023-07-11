<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Objectif_controllers extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Charger la bibliothèque de base de données
    }
	
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('Formulaire_objectif');
	}	
    public function objectifs()
    {
        $this->load->model('Objectifs_models');
        $data['objectif']=$this->Objectifs_models->get_objectifs();
        $data['css']='Formulaire_objectif.css';
        $this -> load -> view('header', $data);
        $this->load->view('Formulaire_objectif',$data);
        $this -> load -> view('footer');
    }
    public function test()
    {
        $id_objectif=1;
        $this->load->model('Objectifs_models');
        $data['test']=$this->Objectifs_models->regime($id_objectif);
        $this->load->view('test_view',$data);
    }
}

    
