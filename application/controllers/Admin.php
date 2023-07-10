<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

    public function __construct(){
        parent::__construct();
        $this->load->model('Regime');
    }
	
	public function index() {
		$this->load->view('newregime');
	}	
	
	public function table() {
		$this->load->view('Accueil');
		$this->load->view('Tables-basic');
		// $this->load->view('Footer');
	}

    public function newRegime() {
        $tab['objectif']=$this -> Regime -> getAllObjectif();
        $tab['menu']=$this -> Regime -> getAllMenu();
        $this->load->view('newregime', $tab);
    }

    public function liste_regime() {

    }

    public function nouveauRegime() {
        $nom_regime = $this -> input -> post("nom_regime");
        $prix_regime = $this -> input -> post("prix_regime");
        $id_menu = $this -> input -> post("id_menu");
        $id_objectif = $this -> input -> post("id_objectif");
        $poid = $this -> input -> post("poid");
        try {
            $this -> Regime -> nouveauRegime($nom_regime, $prix_regime, $id_menu, $id_objectif, $poid);
            redirect("Admin/liste_regime");
        } catch (Exception $e) {
            echo $e -> message;
        }
    }
}
