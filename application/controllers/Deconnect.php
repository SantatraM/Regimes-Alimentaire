<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deconnect extends CI_Controller {
    public function deconnect() {
        $this -> session -> unset_userdata("admin");
        $this -> session -> unset_userdata("client");
        redirect("General");
    }
}