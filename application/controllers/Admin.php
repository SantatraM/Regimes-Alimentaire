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
        $tab['css']='newregime.css';
        $this -> load -> view('header', $tab);
        $this->load->view('newregime', $tab);
    }

    public function liste_regime() {
        $tab["regime"] = $this -> Regime -> getAllRegime();
        $tab["css"]= "liste_regime.css";
        $this -> load -> view("header", $tab);
        $this -> load -> view("liste_regime", $tab);
        $this -> load -> view("footer");
    }

    public function liste_sport() {
        $tab["sport"] = $this -> Regime -> getAllSport();
        $tab["css"]= "liste_regime.css";
        $this -> load -> view("header", $tab);
        $this -> load -> view("liste_sport", $tab);
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

    public function supprimerRegime() {
        $id_regime=$this -> input -> get("id_regime");
        $this -> Regime -> supprimerRegime($id_regime);
        redirect("Admin/liste_regime");
    }

    public function supprimerSport() {
        $id_sport=$this -> input -> get("id_activite_sportive");
        $this -> Regime -> supprimerSport($id_sport);
        redirect("Admin/liste_sport");
    }

    public function newsport() {
        $tab['objectif']=$this -> Regime -> getAllObjectif();
        $tab['css']='newsreport.css';
        $this -> load -> view("header", $tab);
        $this -> load -> view('newsport', $tab);
    }

    public function upload_image($nom_image){
		$config['upload_path'] =  base_url('assets/img/');
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload');
		$this->upload->initialize($config);
		$this->upload->do_upload($nom_image);
		return $file_info = $this->upload->data();
	}

    public function upload(){
        $this->load->helper('url'); 
        $data = array(); 
        if(!empty($_FILES['image_sport']['name'])) {
            $config['upload_path'] = 'assets/img'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
            $config['max_size'] = '100'; // max_size in kb 
            $config['file_name'] = $_FILES['image_sport']['name']; 
            $this->load->library('upload',$config); 
            if($this->upload->do_upload('image_sport')) { 
                $uploadData = $this->upload->data(); 
                $filename = $uploadData['file_name']; 
                $data['response'] = 'successfully uploaded '.$filename; 
            } else { 
                $data['response'] = 'failed'; 
            } 
        } else { 
            $data['response'] = 'failed'; 
        } 
    }

    public function nouveauSport() {
        $this->load->helper('url');
        $data = array();
        if (!empty($_FILES['image_sport']['name'])) {
            $config['upload_path'] = 'assets/img';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|avif';
            $config['max_size'] = '10000'; // max_size in kB
            $config['file_name'] = $_FILES['image_sport']['name'];
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image_sport')) {
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $data['response'] = 'successfully uploaded ' . $filename;
            } else {
                $data['response'] = 'failed';
                $data['error'] = $this->upload->display_errors();
            }
        } else {
            $data['response'] = 'failed';
        }
        $nom_sport = $this->input->post("nom_sport");
        $id_objectif = $this->input->post("id_objectif");
        $poid = $this->input->post("poid");
        $image_sport = $_FILES['image_sport']['name'];
        try {
            $this->Regime->nouveauSport($nom_sport, $id_objectif, $poid, $image_sport);
            redirect("Admin/liste_sport");
        } catch (Exception $e) {
            echo $e->message;
        }
    }
    
    
}
