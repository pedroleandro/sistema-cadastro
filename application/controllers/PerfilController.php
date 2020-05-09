<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerfilController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->library("session");
	}

	public function index(){
		if($this->session->userdata("id")){
			$data = array();
			$data["usuario_id"] = $this->session->userdata("id");
			$this->load->view('perfil.php', $data);
		}else{
			$this->load->view('login.php');
		}
	}
}
