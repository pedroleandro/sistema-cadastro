<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Professores</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- CSS Libraries -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>stisla-master/assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>stisla-master/assets/css/components.css">

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
					<h1>Professores</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="home">Inicio</a></div>
						<div class="breadcrumb-item"><a href="login">Cadastro</a></div>
						<div class="breadcrumb-item">Professores</div>
					</div>
				</div>

				<div class="section-body">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<button id="btn_adicionar_professor" class="btn btn-primary btn-lg btn-block col-lg-4" tabindex="4">
										Adicionar Professor
									</button>
									<div class="col-lg-3">

									</div>
									<div class="card-header-form col-lg-5">
										<form>
											<div class="input-group">

											</div>
										</form>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="tabela_professores" class="table table-striped table-bordered">
											<thead>
											<tr>
												<th>
													#
												</th>
												<th>Nome</th>
												<th>Avatar</th>
												<th>Descricao</th>
												<th>Acao</th>
											</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div id="modal_professor" class="modal fade">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Novo Professor</h4>
							<button id="" name="" type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="form_professor" name="form_professor">
								<input id="id" name="id" hidden>
								<div class="form-group">
									<label class="col-lg-2 control-label">Nome</label>
									<div class="col-lg-12">
										<input id="nome" name="nome" type="text" class="form-control">
										<span class="help-block"></span>
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-2 control-label">Avatar</label>
									<div class="col-lg-12">
										<img id="imagem_arquivo" name="imagem_arquivo" src="" style="max-height: 400px; max-width: 400px; align-items: center">
										<label class="btn btn-info btn-block">Importar Avatar
											<input type="file" id="btn_upload_professor_avatar" accept="image/*" style="display: none;">
										</label>
										<input id="imagem_dir" name="imagem_dir" type="" class="">
										<span class="help-block"></span>
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-2 control-label">Descricao</label>
									<div class="col-lg-12">
										<textarea id="descricao" name="descricao" type="textarea" class="form-control">
										</textarea>
										<span class="help-block"></span>
									</div>
								</div>
								<button id="btn_salvar_professor" name="btn_salvar_professor" type="submit" class="btn btn-primary btn-block col-lg-2" style="float: left">
									Salvar
								</button>
								<span class="help-block"></span>
								<button id="" name="" type="button" class="btn btn-secondary col-lg-2" style="float: right" data-dismiss="modal">Cancelar</button>

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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="<?php echo base_url();?>public/js/professores.js"></script>
<script src="<?php echo base_url();?>public/js/util.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>

<!-- Page Specific JS File -->
</body>
</html>

