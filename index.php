<?php
	$link = mysqli_connect('localhost', 'admin', 'admin123','sumc');
	if (!$link) {
	    die('Não foi possível conectar: ' . mysql_error());
	}
	echo 'Conexão bem sucedida';
	mysqli_close($link);

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
		<img src="img/Logo.png" alt="" width="300px">
		<form class="form-horizontal">
			<div class="control-group">
				<!-- <label class="control-label" for="inputEmail">E-mail</label> -->
				<div class="controls" style="padding: 12px;">
					<span>E-mail </span><input id="inputEmail" type="text" placeholder="Digite o seu e-mail..." />
				</div>
			</div>
			<div class="control-group">
				<!-- <label class="control-label" for="inputPassword">Senha</label> -->
				<div class="controls">
				<span>Senha </span><input id="inputPassword" type="password" placeholder="Digite a sua senha..." />
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<label class="checkbox"><input type="checkbox" /> Lembrar senha</label>
				</div>
			</div>
			<div style="padding:10px">
				<button class="btn" type="submit">Acessar</button>	
			</div>			
		</form>
	</div>
</body>
</html>