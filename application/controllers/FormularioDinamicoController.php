<?php

use Nahid\JsonQ\Jsonq;
require 'vendor/autoload.php';


class FormularioDinamicoController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('formulario.php');
	}

	public function getFormDataJson(){
		$q = new Jsonq('forms/data.json');
		$res = $q->from('products')->where('cat', '=', 2)->get();
		echo "<pre>";
		print_r($res);
	}
}
