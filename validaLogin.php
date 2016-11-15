<?php
// session_start inicia a sessão
// print_r($_POST);
// exit;
session_start();
include_once "funcoes/functions.php";
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['inputEmail'];
$senha = $_POST['inputPassword'];
// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.
// global $link;
$link = mysqli_connect('localhost', 'admin', 'admin123','sumc');

if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
}
$_SESSION['link'] = $link;
if(verificaLoginSenha($login,$senha,$_SESSION['link'])){
	$_SESSION['login'] = $login;
	$_SESSION['senha'] = $senha;
	header('location:Dashboard.php');
}
else{
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	header('location:index.php');
}

// print_r($_POST);
// die();
// exit;

// INSERT INTO `usuario` (`idUsuario`, `nome`, `cpf`, `rg`, `logadouro`, `bairro`, `cidade`, `estado`, `sexo`, `login`, `password`, `tipoUsuario`) VALUES (NULL, 'admin', '11500216674', 'mg18145148', 'asdsd', 'dasda', 'dsadsa', 'dsadsa', 'M', 'admin', 'admin123', '1');
// INSERT INTO `tipo_usuario` (`idTipo_usuario`, `tipo_acesso`) VALUES ('1', 'ADMIN');INSERT INTO `tipo_usuario` (`idTipo_usuario`, `tipo_acesso`) VALUES ('2', 'Médico'), ('3', 'FUNCIONARIO');
?>