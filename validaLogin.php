<?php
// session_start inicia a sessão
session_start();
include_once "funcoes/functions.php";
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['inputEmail'];
$senha = $_POST['inputPassword'];
// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.
$link = mysqli_connect('localhost', 'admin', 'admin123','sumc');
if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
}

if(verificaLoginSenha($login,$senha)){
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



?>