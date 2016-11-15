<?php
	include_once "../funcoes/classusuario.php";
	include_once '../funcoes/functions.php';
	include_once '../funcoes/classusuario.php';

	$teste = new usuario();
	$oi = $teste->todosUsuarios();
	pr($oi);die;
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
						<li >
							<a id="cadastra_usuario" href="../formularios/cadastra_usuario.php">Cadastro de Usuários</a>
						</li>
						<li>
							<a id="cadastra_paciente" href="../formularios/cadastra_paciente.php">Cadastro de Pacientes</a>
						</li>	
						<li>
							<a href="../formularios/cadastra_medico.php">Cadastro de Médicos</a>
						</li>
						<li class="active">
							<a href="../formularios/cadastra_consulta.php">Cadastro de Consulta</a>
						</li>
					</ul>
					<!-- Fim MENU LATERAL -->
				</div>
				<div id="loader" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h1 class="page-header">
					Cadastro de Consulta
					</h1>
					<form action="../funcoes/cadastra_consulta_submit.php" method="post" accept-charset="utf-8">						
						<div class="form-group">
							<label>Nome do Paciente</label>
							<input type="text" class="form-control" id="inputpaciente" aria-describedby="nomeHelp" placeholder="Paciente" name="inputpaciente">
							<small id="nomeHelp" class="form-text text-muted">*Campo Obrigatório</small>
						</div>
						<div class="form-group">
							<label>Nome do Médico</label>
							<input type="text" class="form-control" id="inputmedico" aria-describedby="medicoHelp" placeholder="Médico" name="inputmedico">
							<small id="medicoHelp" class="form-text text-muted">*Campo Obrigatório</small>
						</div>
						<div class="form-group">
							<label>Tipo Sanguíneo</label>
							<input type="text" class="form-control" id="inputsanguineo" aria-describedby="sanguineoHelp" placeholder="Sanguíneo" name="inputsanguineo">
							<small id="sanguineoHelp" class="form-text text-muted">*Campo Obrigatório</small>
						</div>
						<div class="form-group">
							<label>Peso</label>
							<input type="text" class="form-control" id="inputPeso" aria-describedby="PesoHelp" placeholder="Peso" name="inputPeso">
							<small id="sanguineoHelp" class="form-text text-muted">*Campo Obrigatório</small>
						</div>
						<div class="form-group">
							<label>Altura</label>
							<input type="text" class="form-control" id="inputAltura" aria-describedby="AlturaHelp" placeholder="Altura" name="inputAltura">
							<small id="AlturaHelp" class="form-text text-muted">*Campo Obrigatório</small>
						</div>
						
						<div class="medico" style="display: none">
							<div class="form-group">
								<label>Data</label>
								<input type="date" class="form-control" id="inputData" aria-describedby="DataHelp" placeholder="Data" name="inputData">
								<small id="DataHelp" class="form-text text-muted">*Campo Obrigatório</small>
							</div>
							<div class="form-group">
								<label>Diagnostico</label>
								<input type="date" class="form-control" id="inputDiagnostico" aria-describedby="DiagnosticoHelp" placeholder="Diagnostico" name="inputDiagnostico">
								<small id="DiagnosticoHelp" class="form-text text-muted">*Campo Obrigatório</small>
							</div>
							<div class="form-group">
								<label>Detalhes</label>
								<input type="date" class="form-control" id="inputDetalhes" aria-describedby="DetalhesHelp" placeholder="Detalhes" name="inputDetalhes">
								<small id="DetalhesHelp" class="form-text text-muted">*Campo Obrigatório</small>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Criar Usuário</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>