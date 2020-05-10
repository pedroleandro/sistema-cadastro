<?php

use Nahid\JsonQ\Jsonq;
require 'vendor/autoload.php';

class FormularioDinamicoController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data["form"] = $this->buildFormLogin();
		$this->load->view('formulario.php', $data);
	}

	public function getFormDataJson(){
		$q = new Jsonq('forms/data.json');
		$res = $q->from('products')->where('cat', '=', 2)->get();
		echo "<pre>";
		print_r($res);
	}

	public function buildFormLogin(){

		$formLoginJson = new Jsonq('forms/formLogin.json');
		$fields = $formLoginJson->find('fields');

		$form = Array();

		foreach ($fields as $field){

			if($field["tag"] == "input"){
				$item = '	<div class="' .$field["div-class"]. '">
								<label for="' .$field["label-for"]. '">' .$field["label"]. '</label>
								<input id="' .$field["id"]. '" name="' .$field["name"]. '" type="' .$field["type"]. '" class="' .$field["class"]. '	" required>
							</div>';
				array_push($form, $item);
			}else if($field["tag"] == "button"){
				$item = '	<div class="' .$field["div-class"]. '">
								<button id="' .$field["id"]. '" name="' .$field["name"]. '" type="' .$field["type"]. '" class="' .$field["class"]. '">
									' .$field["label"]. '
								</button>
							</div>';
				array_push($form, $item);
			}
		}

		return $form;
	}
}
