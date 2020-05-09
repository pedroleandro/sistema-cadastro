<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function create($data){
		$this->db->insert("cursos", $data);
	}

	public function read($id, $select = NULL){
		if(!empty($select)){
			$this->db->select($select);
		}
		$this->db->from("cursos");
		$this->db->where("id", $id);

		return $this->db->get();
	}

	public function update($id, $data){
		$this->db->where("id", $id);
		$this->db->update("cursos", $data);
	}

	public function delete($id){
		$this->db->where("id", $id);
		$this->db->delete("cursos");
	}

	public function isDuplicate($field, $value, $id = NULL){
		if(!empty($id)){
			$this->db->where("id <>", $id);
		}
		$this->db->from("cursos");
		$this->db->where($field, $value);
		return $this->db->get()->num_rows() > 0;
	}

	var $column_search = array("nome", "descricao");
	var $column_order = array("nome", "", "", "duracao", "", "");

	private function aux_get_dataTable(){

		$search = NULL;

		if($this->input->post("search")){
			$search = $this->input->post("search")["value"];
		}

		$order_column = NULL;
		$order_dir = NULL;

		$order = $this->input->post("order");

		if(isset($order)){
			$order_column = $order[0]["column"];
			$order_dir = $order[0]["dir"];
		}

		$this->db->from("cursos");
		if(isset($search)){
			$first = TRUE;
			foreach ($this->column_search as $field){
				if($first){
					$this->db->group_start();
					$this->db->like($field, $search);
					$first = FALSE;
				}else{
					$this->db->or_like($field, $search);
				}
			}

			if(!$first){
				$this->db->group_end();
			}
		}

		if(isset($order)){
			$this->db->order_by($this->column_order[$order_column], $order_dir);
		}



	}

	public function get_dataTable(){
		$length = $this->input->post("length");
		$start = $this->input->post("start");
		$this->aux_get_dataTable();

		if(isset($length) && $length != 1){
			$this->db->limit($length, $start);
		}

		return $this->db->get()->result();
	}

	public function records_filtered(){
		$this->aux_get_dataTable();
		return $this->db->get()->num_rows();
	}

	public function records_total(){
		$this->db->from("cursos");
		return $this->db->count_all_results();
	}

}
