<?php
	include_once "funcoes/classusuario.php";
	include_once "funcoes/classmedico.php";
	include_once "funcoes/classPaciente.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="bootstrap/js/bootstrap.min.js" media="screen">
</head>
<body class="background">
	<div class="login">
		<form class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="inputEmail">E-mail</label>
				<div class="controls">
					<input id="inputEmail" type="text" placeholder="Digite o seu e-mail..." />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Senha</label>
				<div class="controls">
					<input id="inputPassword" type="password" placeholder="Digite a sua senha..." />
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<label class="checkbox"><input type="checkbox" /> Lembrar senha</label>
					<button class="btn" type="submit">Acessar</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>