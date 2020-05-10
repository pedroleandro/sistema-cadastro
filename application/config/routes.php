<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'Home/index';

//Login
$route['login'] = 'LoginController/index';
$route['logoff'] = 'LoginController/logoff';
$route['loginVerify'] = 'LoginController/login';

//Usuarios
$route['usuarios'] = 'UsuarioController/index';
$route['salvarUsuario'] = 'UsuarioController/salvar_usuario';
$route['listarUsuarios'] = 'UsuarioController/listar_usuarios';
$route['editarUsuario'] = 'UsuarioController/get_editar_usuario';
$route['deletarUsuario'] = 'UsuarioController/deletar_usuario_data';

//Cursos
$route['cursos'] = 'CursoController/index';
$route['imageUpload'] = 'CursoController/import_image';
$route['salvarCurso'] = 'CursoController/salvar_curso';
$route['listarCursos'] = 'CursoController/listar_cursos';
$route['editarCurso'] = 'CursoController/editar_curso_data';
$route['deletarCurso'] = 'CursoController/deletar_curso_data';

//Professores
$route['professores'] = 'ProfessorController/index';
$route['salvarProfessor'] = 'ProfessorController/salvar_professor';
$route['listarProfessores'] = 'ProfessorController/listar_professores';
$route['editarProfessor'] = 'ProfessorController/editar_professor_data';
$route['deletarProfessor'] = 'ProfessorController/deletar_professor_data';

//Area Restrita
$route['perfil'] = 'PerfilController/index';

//Formulario Dinamico
$route['form'] = 'FormularioDinamicoController/index';



