<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('General_model');
        if($this -> session -> userdata("admin")) {
            redirect("Admin/liste_regime");
        }
    }
  
	public function index(){
		$this->load->view('login');
	}	 	
	
    public function error_login(){
		$data['errorl'] = 'Your Account is Invalid';  
		$this->load->view('login',$data);
	}	

    public function process_login() {
		$email = $this->input->post('email');
		$mdp = $this->input->post('password');
        $this->load->model('General_model');
		$data=$this->General_model->getdata($email, $mdp);
		if(count($data)==0) {
			$data['errorl'] = 'Your Account is Invalid'; 
			$this->load->view('login',$data); 
		} else {
			$this->session->set_userdata('client',$data);
			redirect('Client/objectifs');
		}
    }

	public function inscription() {
		$this->load->model('General_model');
		$data['sexe'] = $this->General_model->get_sexe();
		$this->load->view('inscription',$data);
	}

	public function insert_utilisateur()
    {
		$this->load->model('General_model');
        $prenoms = $this->input->post('username');
        $email= $this->input->post('email');
        $date_de_naissance= $this->input->post('dtn');
        $sexe= $this->input->post('sexe');
        $mot_de_passe= $this->input->post('password');

        $this->General_model->insertion_utilisateur($prenoms,$email,$date_de_naissance,$sexe,$mot_de_passe);

		redirect('General');
    }

    public function login_admin() {
        $this -> load -> view('login_admin');
    }

    public function process_login_admin() {
        $email=$this -> input -> post('email_admin');
        $mdp=$this -> input -> post('mdp_admin');
        $admin = $this -> General_model -> getCorrespondingAdmin($email, $mdp);
        if(count($admin)==0) {
            redirect("General/login_admin");
        } else {
            $this -> session -> set_userdata("admin", $admin);
            redirect("Admin/liste_regime");
        }
    }
}
}
