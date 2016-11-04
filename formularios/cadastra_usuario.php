<?php

	include_once "../funcoes/classusuario.php";
	
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="../img/icone-SUMC2.png">
		<title>Cadastra Usuário</title>
		<link rel="stylesheet" type="text/css" href="../styleDash.css" media="screen">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" media="screen">
		<link rel="stylesheet" type="text/css" href="../bootstrap/js/bootstrap.min.js">
		<script src="../bootstrap/js/ie-emulation-modes-warning.js"></script>
		<script src="../bootstrap/js/ie10-viewport-bug-workaround.js"></script>
		<script src="../bootstrap/js/holder.min.js"></script>
		<script src="../bootstrap/js/jquery.min.js"></script>
	</head>
	<body class="fomulario">
		<div>
			<form>
			  <div class="form-group">
				<label>Endereço de Email</label>
				<input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Endereço de Email">
				<small id="emailHelp" class="form-text text-muted">*Campo Obrigatório</small>
			  </div>
			  <div class="form-group">
				<label>Nome do Usuário</label>
				<input type="text" class="form-control" id="inputUsuario" aria-describedby="" placeholder="Nome do Usuário">
				<small id="" class="form-text text-muted">*Campo Obrigatório</small>
			  </div>
			  <div class="form-group">
				<label for="inputPassword">Senha</label>
				<input type="password" class="form-control" id="inputPassword" placeholder="Password">
				<small id="" class="form-text text-muted">*Campo Obrigatório</small>
			  </div>
			  <div class="form-group">
				<label for="selectNivel">Nível de Acesso</label>
				<select class="form-control" id="selectNivel">
				  <option> </option>
				  <option>Medico</option>
				  <option>Administrador</option>
				</select>
				<small id="" class="form-text text-muted">*Campo Obrigatório</small>
			  </div>		  
			  <button type="submit" class="btn btn-primary">Criar Usuário</button>
			</form>
		</div>
	</body>
</html>