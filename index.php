<?php

	include_once "funcoes/classusuario.php";
	include_once "funcoes/classmedico.php";
	include_once "funcoes/classPaciente.php";    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="./styleIndex.css">
	<link rel="icon" href="img/icone-SUMC2.png">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="bootstrap/js/bootstrap.min.js" media="screen">
</head>
<body class="background">
	<div>
		<div class="login">
		<img src="img/Logo.png" alt="" width="300px">
		<form class="form-horizontal" method="post" action="validaLogin.php" accept-charset="utf-8">
			<div class="control-group">
				<!-- <label class="control-label" for="inputEmail">E-mail</label> -->
				<div class="controls">
					<span>E-mail </span><input id="inputEmail" class="form-control" type="text" name="inputEmail" placeholder="Digite o seu e-mail..." />
				</div>
			</div>
			<div class="control-group">
				<!-- <label class="control-label" for="inputPassword">Senha</label> -->
				<div class="controls">
				<span>Senha </span><input id="inputPassword" class="form-control" type="password" name="inputPassword" placeholder="Digite a sua senha..." />
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<label class="checkbox"><input type="checkbox" /> Lembrar senha</label>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<button class="btn btn-primary btn-lg btn-block" type="submit">Acessar</button>	
				</div>
			</div>			
		</form>
	</div>
	</div>
</body>
</html>