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
        $tab["regime"] = $this -> Regime -> getAllRegime();
        $tab["css"]= "liste_regime.css";
        $this -> load -> view("header", $tab);
        $this -> load -> view("liste_regime", $tab);
        $this -> load -> view("footer");
    }

    public function getMenuOfRegime() {
        $id_regime=$this -> input -> get("id_regime");
        $tab["regime"] = $this -> Regime -> getCorrespondingRegime($id_regime);
        $tab["css"]= "liste_menu.css";
        $tab["menu"] = $this -> Regime -> getMenuOfRegime($id_regime);
        $this -> load -> view("header", $tab);
        $this -> load -> view("liste_menu", $tab);
        $this -> load -> view("footer");
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

    public function newcodemonaie() {
        $this->load->model('Code_model');
        $datas['code'] = $this->Code_model->getCode();
        $data['css']='code_monaie.css';
        $this->load->view('header', $data);
        $this->load->view('code_monaie',$datas);
        $this->load->view('Footer');
    }

    public function save_code() {
        $this->load->model('Code_model');
        $code = $this->input->post('numero');
        $montant = $this->input->post('montant');
        $codes = $this->Code_model->getAllCode();
    
        foreach ($codes as $row) {
            if ($row['numero'] == $code) {
                $data['code'] = $this->Code_model->getCode();
                $data['error'] = "Ce code ne peut plus etre utilise";
                $data['css']='code_monaie.css';
                $this->load->view('header', $data);
                $this->load->view('code_monaie', $data);
                $this->load->view('Footer');
                return;
            }
        }
    
        $this->Code_model->Save_Code($code, $montant);
        redirect('Admin/newcodemonaie');
    }

    function delete($id) {
        $this->load->model('Code_model');
        $this->Code_model->delete($id);

        redirect('Admin/newcodemonaie');
    }

}
