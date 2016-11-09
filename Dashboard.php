<?php
include_once 'funcoes/functions.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="img/icone-SUMC2.png">
		<title>
			Home
		</title>    		    
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">
		<link rel="stylesheet" type="text/css" href="bootstrap/js/bootstrap.min.js">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/ie10-viewport-bug-workaround.css" media="screen">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/dashboard.css" media="screen">
		<script src="bootstrap/js/ie-emulation-modes-warning.js"></script>
		<script src="bootstrap/js/ie10-viewport-bug-workaround.js"></script>
		<script src="bootstrap/js/holder.min.js"></script>
		<script src="bootstrap/js/funcoes.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script>
		$( document ).ready(function() {
		});
		</script>		
		<link rel="stylesheet" type="text/css" href="./styleDash.css">
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
					<a class="navbar-brand" href="#"><img src="img/LogoBranca.png" alt="" height="36px"></a>
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
						<li class="active">
							<a href="#">Home</a>
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
						<li>
							<a id="cadastra_usuario" href="formularios/cadastra_usuario.php">Cadastro de Usuários</a>
						</li>
						<li>
							<a id="cadastra_paciente" href="formularios/cadastra_paciente.php">Cadastro de Pacientes</a>
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
				<div id="home" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h1 class="page-header">
						Dashboard
					</h1>
					<div class="row placeholders">
						<div class="col-xs-6 col-sm-3 placeholder">
							<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
							width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
							<h4>
								Label
							</h4>
							<span class="text-muted">
								Something else
							</span>
						</div>
						<div class="col-xs-6 col-sm-3 placeholder">
							<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
							width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
							<h4>
								Label
							</h4>
							<span class="text-muted">
								Something else
							</span>
						</div>
						<div class="col-xs-6 col-sm-3 placeholder">
							<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
							width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
							<h4>
								Label
							</h4>
							<span class="text-muted">
								Something else
							</span>
						</div>
						<div class="col-xs-6 col-sm-3 placeholder">
							<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
							width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
							<h4>
								Label
							</h4>
							<span class="text-muted">
								Something else
							</span>
						</div>
					</div>
					<h2 class="sub-header">
						Section title
					</h2>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Header
									</th>
									<th>
										Header
									</th>
									<th>
										Header
									</th>
									<th>
										Header
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										1,001
									</td>
									<td>
										Lorem
									</td>
									<td>
										ipsum
									</td>
									<td>
										dolor
									</td>
									<td>
										sit
									</td>
								</tr>
								<tr>
									<td>
										1,002
									</td>
									<td>
										amet
									</td>
									<td>
										consectetur
									</td>
									<td>
										adipiscing
									</td>
									<td>
										elit
									</td>
								</tr>
								<tr>
									<td>
										1,003
									</td>
									<td>
										Integer
									</td>
									<td>
										nec
									</td>
									<td>
										odio
									</td>
									<td>
										Praesent
									</td>
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>
				<div id="loader" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				</div>
			</div>
		</div>
	</body>
</html>