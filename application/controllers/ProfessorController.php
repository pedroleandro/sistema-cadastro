<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfessorController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->library("session");
	}

	public function index(){

		if($this->session->userdata("id")){
			$this->load->view('professores.php');
		}else{
			$this->load->view('login.php');
		}

	}

	public function salvar_professor(){
		if(!$this->input->is_ajax_request()){
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;
		$json["error_list"] = array();

		$this->load->model("professores");

		$data = $this->input->post();

		if(empty($data["nome"])){
			$json["error_list"]["#nome"] = "Nome do Professor e obrigatorio!";
		}

		if(!empty($json["error_list"])){
			$json["status"] = 0;
		}else{

			if(!empty($data["imagem_dir"])){

				$file_name = basename($data["imagem_dir"]);
				$old_path = getcwd() . "/tmp/" . $file_name;
				$new_path = getcwd() . "/public/images/professores/" . $file_name;

				rename($old_path, $new_path);

				$data["imagem_dir"] = "/public/images/professores/" . $file_name;

			}else{
				unset($data["imagem_dir"]);
			}

			if(empty($data["id"])){
				$this->professores->create($data);
			}else{
				$id = $data["id"];
				unset($data["id"]);
				$this->professores->update($id, $data);
			}

		}
		echo json_encode($json);
	}

	public function listar_professores(){

		if(!$this->input->is_ajax_request()){
			exit("Nenhum acesso de script direto permitido!");
		}

		$this->load->model("professores");

		$_professores = $this->professores->get_dataTable();

		$data = array();
		foreach ($_professores as $professor){

			$row = array();
			$row[] = $professor->id;
			$row[] = $professor->nome;

			if($professor->imagem_dir){
				$row[] = '<img src="'.base_url().$professor->imagem_dir.'" style="max-heigth: 100px; max-width: 100px;">';
			}else{
				$row[] = "";
			}

			$row[] = '<div class="description">'.$professor->descricao.'</div>';

			$row[] = '	<div style="display: inline-block;">
							<button professor_id="'.$professor->id.'" class="btn btn-primary btn-editar-professor">
								<i class="fa fa-edit"></i>
							</button>
							<button professor_id="'.$professor->id.'" class="btn btn-danger btn-deletar-professor">
								<i class="fa fa-times"></i>
							</button>
						</div>';

			$data[] = $row;

		}

		$json = array(
			"draw" => $this->input->post("draw"),
			"recordsTotal" => $this->professores->records_total(),
			"recordsFiltered" => $this->professores->records_filtered(),
			"data" => $data
		);

		echo json_encode($json);

	}

	public function editar_professor_data(){
		if(!$this->input->is_ajax_request()){
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;
		$json["input"] = array();

		$this->load->model("professores");

		$id = $this->input->post("professor_id");
		$data = $this->professores->read($id)->result_array()[0];

		$json["input"]["id"] = $data["id"];
		$json["input"]["nome"] = $data["nome"];
		$json["input"]["descricao"] = $data["descricao"];

		$json["img"]["imagem_dir"] = base_url() . $data["imagem_dir"];


		echo json_encode($json);
	}

	public function deletar_professor_data(){

		if(!$this->input->is_ajax_request()){
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;

		$this->load->model("professores");

//		$id = $this->session->userdata("id");
		$id = $this->input->post("professor_id");
		$this->professores->delete($id);

		echo json_encode($json);

	}
}
