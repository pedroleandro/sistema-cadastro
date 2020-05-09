<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class LoginController extends CI_Controller
{

	public function __construct(){
		parent::__construct();
		$this->load->library("session");
	}

	public function index(){
		if($this->session->userdata("id")){
			$data = array();
			$data["user_id"] = $this->session->userdata("id");
			$this->load->view('restrict.php', $data);
		}else{
			$this->load->view('login.php');
		}
	}

	public function logoff(){
		$this->session->sess_destroy();
		header("Location: ". base_url() . "login");
	}


	public function login(){

		if(!$this->input->is_ajax_request()){
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;
		$json["error_list"] = array();

		$email = $this->input->post("email");
		$password = $this->input->post("password");

		if(empty($email)){
			$json["status"] = 0;
			$json["error_list"]["#email"] = "Email nao pode ser vazio";
		}else{
			$this->load->model("usuarios");
			$result = $this->usuarios->getUserData($email);

			if($result){
				$id = $result->id;
				$senha = $result->senha;

				if(password_verify($password, $senha)){

					$this->session->set_userdata("id", $id);

				}else{
					$json["status"] = 0;
				}

			}else{
				$json["status"] = 0;
			}

			if($json["status"] == 0){
				$json["error_list"]["#btn_login"] = "E-mail e/ou Senha Incorretos!";
			}

		}
		echo json_encode($json);

	}

}
