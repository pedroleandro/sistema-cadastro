<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CursoController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->library("session");
	}

	public function index(){
		if($this->session->userdata("id")){
			$this->load->view('cursos.php');
		}else{
			$this->load->view('login.php');
		}
	}

	public function import_image(){

		if(!$this->input->is_ajax_request()){
			exit("Nenhum acesso de script direto permitido!");
		}

		$config["upload_path"] = "./tmp/";
		$config["allowed_types"] = "gif|png|jpg";
		$config["overwhite"] = TRUE;

		$this->load->library("upload", $config);

		$json = array();
		$json["status"] = 1;
		$json["error_list"] = array();

		if(!$this->upload->do_upload("imagem_arquivo")){
			$json["status"] = 0;
			$json["error_list"] = $this->upload->display_errors("","");
		}else{
			if($this->upload->data()["file_size"] 	<= 5120){
				$nome_arquivo = $this->upload->data()["file_name"];
				$json["imagem_dir"] = base_url() . "tmp/" . $nome_arquivo;
			}else{
				$json["status"] = 0;
				$json["error_list"] = "O arquivo de imagem nao deve ser maior que 5MB";
			}
		}

		echo json_encode($json);
	}

	public function salvar_curso(){

		if(!$this->input->is_ajax_request()){
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;
		$json["error_list"] = array();

		$this->load->model("cursos");

		$data = $this->input->post();

		if(empty($data["nome"])){
			$json["error_list"]["#nome"] = "Nome do curso e obrigatorio!";
		}else{
			if($this->cursos->isDuplicate("nome", $data["nome"], $data["id"])){
				$json["error_list"]["#nome"] = "Nome do curso ja existe!";
			}
		}

		$data["duracao"] = floatval($data["duracao"]);
		if(empty($data["duracao"])){
			$json["error_list"]["#duracao"] = "Duracao do curso e obrigatorio!";
		}else{
			if(!($data["duracao"] > 0 && $data["duracao"] < 100)){
				$json["error_list"]["#duracao"] = "Duracao do curso deve ser, > 0h e < 100h!";
			}
		}

		if(!empty($json["error_list"])){
			$json["status"] = 0;
		}else{

			if(!empty($data["imagem_dir"])){

				$file_name = basename($data["imagem_dir"]);
				$old_path = getcwd() . "/tmp/" . $file_name;
				$new_path = getcwd() . "/public/images/cursos/" . $file_name;

				rename($old_path, $new_path);

				$data["imagem_dir"] = "/public/images/cursos/" . $file_name;

			}else{
				unset($data["imagem_dir"]);
			}

			if(empty($data["id"])){
				$this->cursos->create($data);
			}else{
				$id = $data["id"];
				unset($data["id"]);
				$this->cursos->update($id, $data);
			}

		}
		echo json_encode($json);
	}

	public function listar_cursos(){


		$this->load->model("cursos");

		$_cursos = $this->cursos->get_dataTable();

		$data = array();
		foreach ($_cursos as $curso){

			$row = array();
			$row[] = $curso->id;
			$row[] = $curso->nome;

			if($curso->imagem_dir){
				$row[] = '<img src="'.base_url().$curso->imagem_dir.'" style="max-heigth: 100px; max-width: 100px;">';
			}else{
				$row[] = "";
			}

			$row[] = '<div class="description">'.$curso->descricao.'</div>';
			$row[] = $curso->duracao;

			$row[] = '	<div style="display: inline-block;">
							<button curso_id="'.$curso->id.'" class="btn btn-primary btn-editar-curso">
								<i class="fa fa-edit"></i>
							</button>
							<button curso_id="'.$curso->id.'" class="btn btn-danger btn-deletar-curso">
								<i class="fa fa-times"></i>
							</button>
						</div>';

			$data[] = $row;

		}
//		echo "<pre>";
//		print_r($data);
//		exit();

		$json = array(
			"draw" => $this->input->post("draw"),
			"recordsTotal" => $this->cursos->records_total(),
			"recordsFiltered" => $this->cursos->records_filtered(),
			"data" => $data
		);
		echo json_encode($json);
	}

	public function editar_curso_data(){

		if(!$this->input->is_ajax_request()){
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;
		$json["input"] = array();

		$this->load->model("cursos");

//		$id = $this->session->userdata("id");
		$id = $this->input->post("curso_id");
		$data = $this->cursos->read($id)->result_array()[0];

		$json["input"]["id"] = $data["id"];
		$json["input"]["nome"] = $data["nome"];
		$json["input"]["descricao"] = $data["descricao"];
		$json["input"]["duracao"] = $data["duracao"];

		$json["img"]["imagem_arquivo"] = base_url() . $data["imagem_dir"];

		echo json_encode($json);
	}

	public function deletar_curso_data(){

		if(!$this->input->is_ajax_request()){
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;

		$this->load->model("cursos");

//		$id = $this->session->userdata("id");
		$id = $this->input->post("curso_id");
		$this->cursos->delete($id);

		echo json_encode($json);
	}

}
