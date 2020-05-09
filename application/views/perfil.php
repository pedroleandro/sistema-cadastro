<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Perfil</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- CSS Libraries -->

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>stisla-master/assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>stisla-master/assets/css/components.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/public/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/public/css/datatables.min.css">
</head>
<body>
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<nav class="navbar navbar-expand-lg main-navbar">
			<form class="form-inline mr-auto">
				<ul class="navbar-nav mr-3">
					<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
					<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
				</ul>
			</form>
			<ul class="navbar-nav navbar-right">
				<li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
					<div class="dropdown-menu dropdown-list dropdown-menu-right">
						<div class="dropdown-header">Mensagens
							<div class="float-right">
								<a href="#">Marcar todas como lidas</a>
							</div>
						</div>
						<div class="dropdown-footer text-center">
							<a href="#">View All <i class="fas fa-chevron-right"></i></a>
						</div>
					</div>
				</li>
				<li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
					<div class="dropdown-menu dropdown-list dropdown-menu-right">
						<div class="dropdown-header">Notificaçoes
							<div class="float-right">
								<a href="#">Marcar todas como lidas</a>
							</div>
						</div>
						<div class="dropdown-footer text-center">
							<a href="#">Visualizar tudo<i class="fas fa-chevron-right"></i></a>
						</div>
					</div>
				</li>
				<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
						<img alt="image" src="<?php echo base_url();?>stisla-master/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
						<div class="d-sm-none d-lg-inline-block">Ola, Pedro Leandro</div></a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="dropdown-title"></div>
						<a href="perfil" class="dropdown-item has-icon">
							<i class="far fa-user"></i> Perfil
						</a>
						<a href="#" class="dropdown-item has-icon">
							<i class="fas fa-bolt"></i> Atividades
						</a>
						<a href="#" class="dropdown-item has-icon">
							<i class="fas fa-cog"></i> Configuraçoes
						</a>
						<div class="dropdown-divider"></div>
						<a href="logoff" class="dropdown-item has-icon text-danger">
							<i class="fas fa-sign-out-alt"></i> Sair
						</a>
					</div>
				</li>
			</ul>
		</nav>

		<div class="main-sidebar">
			<aside id="sidebar-wrapper">
				<div class="sidebar-brand">
					<a href="login">GeCad</a>
				</div>
				<div class="sidebar-brand sidebar-brand-sm">
					<a href="login">GC</a>
				</div>
				<ul class="sidebar-menu">

					<li class="menu-header">Inicio</li>
					<li class="nav-item dropdown">
						<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Cadastro</span></a>
						<ul class="dropdown-menu">
							<li><a class="nav-link" href="cursos">Cursos</a></li>
							<li><a class="nav-link" href="professores">Professores</a></li>
							<li><a class="nav-link" href="usuarios">Usuarios</a></li>
						</ul>
					</li>

				</ul>


			</aside>
		</div>

		<!-- Main Content -->
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>Perfil</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="home">Inicio</a></div>
						<div class="breadcrumb-item"><a href="login">Configuraçoes</a></div>
						<div class="breadcrumb-item">Perfil</div>
					</div>
				</div>

				<div class="section-body">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<button usuario_id="<?=$usuario_id?>" id="btn_editar_perfil_usuario" class="btn btn-primary btn-lg btn-block col-lg-4" tabindex="4">
										Editar Perfil
									</button>
								</div>
								<div class="card-body">

								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div id="modal_usuario" class="modal fade">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Novo Usuario</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="form_usuario">
								<input name="id" hidden>
								<div class="form-group">
									<label class="col-lg-2 control-label">Usuario</label>
									<div class="col-lg-12">
										<input id="usuario" name="usuario" type="text" class="form-control">
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2 control-label">Nome</label>
									<div class="col-lg-12">
										<input id="nome" name="" type="text" class="form-control">
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2 control-label">Email</label>
									<div class="col-lg-12">
										<input id="email" name="" type="email" class="form-control">
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2 control-label">Confirmar E-mail</label>
									<div class="col-lg-12">
										<input id="email_confirmacao" type="email" class="form-control">
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2 control-label">Senha</label>
									<div class="col-lg-12">
										<input id="senha" type="password" class="form-control">
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2 control-label">Confirmar Senha</label>
									<div class="col-lg-12">
										<input id="senha_confirmacao" type="password" class="form-control">
										<span class="help-block"></span>
									</div>
								</div>
								<button id="btn_salvar_usuario" type="submit" class="btn btn-primary btn-block col-lg-2" style="float: left">
									Salvar
								</button>
								<span class="help-block"></span>
								<button id="" type="button" class="btn btn-secondary col-lg-2" style="float: right" data-dismiss="modal">Cancelar</button>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
		<footer class="main-footer">
			<div class="footer-left">
				Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
			</div>
			<div class="footer-right">
				2.3.0
			</div>
		</footer>
	</div>

</div>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?php echo base_url();?>stisla-master/assets/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="<?php echo base_url();?>stisla-master/assets/js/scripts.js"></script>
<script src="<?php echo base_url();?>stisla-master/assets/js/custom.js"></script>
<script src="<?php echo base_url();?>public/js/usuarios.js"></script>
<script src="<?php echo base_url();?>public/js/util.js"></script>
<script src="<?php echo base_url();?>/public/js/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url();?>/public/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/public/js/datatables.min.js"></script>

<!-- Page Specific JS File -->
</body>
</html>


