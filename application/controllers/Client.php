<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

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

	
	public function index()
	{
        $this->load->model('CodeClient_model');
        $data['code'] = $this->CodeClient_model->getCode();
        $this->load->view('Client',$data);
	}	

    public function save() { //save porte_monaie
        $this->load->model('CodeClient_model');
        $user = null;
        $code = $this->input->post('numero');
        $id_code = $this->CodeClient_model->getIdCode($code);
        $this->CodeClient_model->insert_porte_monaie($user,$id_code);
        redirect('Client/index');
    }

	
    
	
}
