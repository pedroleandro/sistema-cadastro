<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->library("session");
	}

	public function index(){
		if($this->session->userdata("id")){
			$this->load->view('usuarios.php');
		}else{
			$this->load->view('login.php');
		}

	}

	public function salvar_usuario(){

		if(!$this->input->is_ajax_request()){
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;
		$json["error_list"] = array();

		$this->load->model("usuarios");

		$data = $this->input->post();

		if(empty($data["usuario"])){
			$json["error_list"]["#usuario"] = "Nome de usuario e obrigatorio!";
		}else{
			if($this->usuarios->isDuplicate("usuario", $data["usuario"], $data["id"])){
				$json["error_list"]["#usuario"] = "Nome do usuario ja existe!";
			}
		}

		if(empty($data["nome"])){
			$json["error_list"]["#nome"] = "Nome Completo e obrigatorio!";
		}

		if(empty($data["email"])){
			$json["error_list"]["#email"] = "E-mail e obrigatorio!";
		}else{
			if($this->usuarios->isDuplicate("email", $data["email"], $data["id"])){
				$json["error_list"]["#email"] = "E-mail ja existe!";
			}else{
				if($data["email"] != $data["email_confirmacao"]){
					$json["error_list"]["#email"] = "";
					$json["error_list"]["#email_confirmacao"] = "E-mails nao sao iguais!";
				}
			}
		}

		if(empty($data["senha"])){
			$json["error_list"]["#senha"] = "Senha e obrigatorio!";
		}else{
				if($data["senha"] != $data["senha_confirmacao"]){
					$json["error_list"]["#senha"] = "";
					$json["error_list"]["#senha_confirmacao"] = "Senhas nao sao iguais!";
				}

		}

		if(!empty($json["error_list"])){
			$json["status"] = 0;
		}else{

			$data["senha"] = password_hash($data["senha"], PASSWORD_DEFAULT);

			unset($data["senha_confirmacao"]);
			unset($data["email_confirmacao"]);

			if(empty($data["id"])){
				$this->usuarios->create($data);
			}else{
				$id = $data["id"];
				unset($data["id"]);
				$this->usuarios->update($id, $data);
			}

		}
		echo json_encode($json);
	}

	public function get_editar_usuario(){

		if(!$this->input->is_ajax_request()){
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;
		$json["input"] = array();

		$this->load->model("usuarios");

		$id = $this->input->post("usuario_id");
		$data = $this->usuarios->read($id)->result_array()[0];

		$json["input"]["id"] = $data["id"];
		$json["input"]["usuario"] = $data["usuario"];
		$json["input"]["nome"] = $data["nome"];
		$json["input"]["email"] = $data["email"];
		$json["input"]["email_confirmacao"] = $data["email"];
		$json["input"]["senha"] = $data["senha"];
		$json["input"]["senha_confirmacao"] = $data["senha"];

		echo json_encode($json);
	}

	public function listar_usuarios(){

		if(!$this->input->is_ajax_request()){
			exit("Nenhum acesso de script direto permitido!");
		}

		$this->load->model("usuarios");

		$_usuarios = $this->usuarios->get_dataTable();

		$data = array();
		foreach ($_usuarios as $usuario){

			$row = array();
			$row[] = $usuario->id;
			$row[] = $usuario->nome;
			$row[] = $usuario->usuario;
			$row[] = $usuario->email;

			$row[] = '	<div style="display: inline-block;">
							<button usuario_id="'.$usuario->id.'" class="btn btn-primary btn-editar-usuario">
								<i class="fa fa-edit"></i>
							</button>
							<button usuario_id="'.$usuario->id.'" class="btn btn-danger btn-deletar-usuario">
								<i class="fa fa-times"></i>
							</button>
						</div>';

			$data[] = $row;

		}

		$json = array(
			"draw" => $this->input->post("draw"),
			"recordsTotal" => $this->usuarios->records_total(),
			"recordsFiltered" => $this->usuarios->records_filtered(),
			"data" => $data
		);

		echo json_encode($json);

	}

	public function deletar_usuario_data(){

		if(!$this->input->is_ajax_request()){
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;

		$this->load->model("usuarios");

		$id = $this->input->post("usuario_id");
		$this->usuarios->delete($id);

		echo json_encode($json);

	}
}
