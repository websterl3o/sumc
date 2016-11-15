<?php
	include_once "../funcoes/classusuario.php";
	include_once '../funcoes/functions.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../img/icone-SUMC2.png">
		<title>
		Cadastro de Usuário
		</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" media="screen">
		<link rel="stylesheet" type="text/css" href="../bootstrap/js/bootstrap.min.js">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/ie10-viewport-bug-workaround.css" media="screen">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/dashboard.css" media="screen">
		<script src="../bootstrap/js/ie-emulation-modes-warning.js"></script>
		<script src="../bootstrap/js/ie10-viewport-bug-workaround.js"></script>
		<script src="../bootstrap/js/holder.min.js"></script>
		<script src="../bootstrap/js/funcoes.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script>
		$( document ).ready(function() {
		});
		</script>
		<link rel="stylesheet" type="text/css" href="../styleDash.css">
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
					data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">
						Toggle navigation
					</span>
					<span class="icon-bar">
					</span>
					<span class="icon-bar">
					</span>
					<span class="icon-bar">
					</span>
					</button>
					<a class="navbar-brand" href="../Dashboard.php"><img src="../img/LogoBranca.png" alt="" height="36px"></a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<!-- <li>
								<a href="#">Home</a>
						</li> -->
						<li>
							<a href="#">Configurações</a>
						</li>
						<li>
							<a href="#">Perfil</a>
						</li>
						<li>
							<a href="#">Ajuda</a>
						</li>
						<li>
							<a href="../limpalogin.php">Sair</a>
						</li>
					</ul>
					<!-- <form class="navbar-form navbar-right">
							<input type="text" class="form-control" placeholder="Procurar...">
					</form> -->
				</div>
			</div>
		</nav>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
					<!-- Inicio do MENU LATERAL -->
					<ul class="nav nav-sidebar">
						<li >
							<a href="../Dashboard.php">Home</a>
						</li>
					</ul>
					<ul class="nav nav-sidebar">
						<li class="">
							<a href="#" class="disabled">Informações</a>
						</li>
						<li>
							<a href="#">Informações sobre Usuários</a>
						</li>
						<li>
							<a href="#">Informações sobre Pacientes</a>
						</li>
						<li>
							<a href="#">Informações sobre Médicos</a>
						</li>
						<li>
							<a href="#">Informações sobre Consulta</a>
						</li>
					</ul>
					<ul class="nav nav-sidebar">
						<li>
							<a href="#" class="disabled">Cadastros</a>
						</li>
						<li class="active">
							<a id="cadastra_usuario" href="../formularios/cadastra_usuario.php">Cadastro de Usuários</a>
						</li>
						<li>
							<a id="cadastra_paciente" href="../formularios/cadastra_paciente.php">Cadastro de Pacientes</a>
						</li>	
						<li>
							<a href="#">Cadastro de Médicos</a>
						</li>
						<li>
							<a href="#">Cadastro de Consulta</a>
						</li>
					</ul>
					<!-- Fim MENU LATERAL -->
				</div>
				<div id="loader" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h1 class="page-header">
					Cadastro de Usuário
					</h1>
					<form action="../funcoes/cadastra_usuario_submit.php" method="post" accept-charset="utf-8">
						<div class="form-group">
							<label>Nome</label>
							<input type="text" class="form-control" id="inputNome" aria-describedby="nomeHelp" placeholder="Nome" name="inputNome">
							<small id="nomeHelp" class="form-text text-muted">*Campo Obrigatório</small>
						</div>
						<div class="form-group">
							<label>Endereço de Email</label>
							<input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Endereço de Email" name="inputEmail">
							<small id="emailHelp" class="form-text text-muted">*Campo Obrigatório</small>
						</div>
						<div class="form-group">
							<label>CPF</label>
							<input type="text" class="form-control" id="inputCPF" aria-describedby="" placeholder="CPF" name="inputCPF">
							<small id="" class="form-text text-muted">*Campo Obrigatório</small>
						</div>
						<div class="form-group">
							<label>RG</label>
							<input type="text" class="form-control" id="inputRG" aria-describedby="" placeholder="RG" name="inputRG">
							<small id="" class="form-text text-muted">*Campo Obrigatório</small>
						</div>
						<div class="form-group">
							<label>Logradouro</label>
							<input type="text" class="form-control" id="inputLogradouro" aria-describedby="" placeholder="Logradouro" name="inputLogradouro"> 
							<small id="" class="form-text text-muted">*Campo Obrigatório</small>
						</div>
						<div class="form-group">
							<label>Bairro</label>
							<input type="text" class="form-control" id="inputBairro" aria-describedby="" placeholder="Bairro" name="inputBairro">
							<small id="" class="form-text text-muted">*Campo Obrigatório</small>
						</div>
						<div class="form-group">
							<label>Cidade</label>
							<input type="text" class="form-control" id="inputCidade" aria-describedby="" placeholder="Cidade" name="inputCidade">
							<small id="" class="form-text text-muted">*Campo Obrigatório</small>
						</div>
						<div class="form-group">
							<label>Estado</label>
							<input type="text" class="form-control" id="inputEstado" aria-describedby="" placeholder="Estado" name="inputEstado">
							<small id="" class="form-text text-muted">*Campo Obrigatório</small>
						</div>
						<div class="form-group">
							<label for="selectSexo">Sexo</label>
							<select class="form-control" id="selectSexo" name="selectSexo">
								<option> </option>
								<option>M</option>
								<option>F</option>
								<option>Outro</option>
							</select>
							<small id="" class="form-text text-muted">*Campo Obrigatório</small>
						</div>						
						<div class="form-group">
							<label>Nome do Login</label>
							<input type="text" class="form-control" id="inputUsuario" aria-describedby="" placeholder="Nome do Usuário" name="inputUsuario">
							<small id="" class="form-text text-muted">*Campo Obrigatório</small>
						</div>
						<div class="form-group">
							<label for="inputPassword">Senha</label>
							<input type="password" class="form-control" id="inputPassword" placeholder="Password" name="inputPassword">
							<small id="" class="form-text text-muted">*Campo Obrigatório</small>
						</div>
						<div class="form-group">
							<label for="selectNivel">Nível de Acesso</label>
							<select class="form-control" id="selectNivel" name="selectNivel">
								<option> </option>
								<option>Funcionário</option>
								<option>Médico</option>
								<option>Administrador</option>
							</select>
							<small id="" class="form-text text-muted">*Campo Obrigatório</small>
						</div>
						<button type="submit" class="btn btn-primary">Criar Usuário</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>