<?php

require_once './functions.php';
require_once './classusuario.php';

extract($_POST);
$usuario = new usuario();

$dados[0] = $inputNome;
$dados[1] = $inputCPF;
$dados[2] = $inputRG;
$dados[3] = $inputLogradouro;
$dados[4] = $inputBairro;
$dados[5] = $inputCidade;
$dados[6] = $inputEstado;
$dados[7] = $selectSexo;
$dados[8] = $inputUsuario;
$dados[9] = $inputPassword;
$dados[10] = $selectNivel;
$dados[11] = $inputEmail; 


if($usuario->insereUsuario($dados)){
	$info = 'Cadastro realizado com sucesso !';
	header('location:../Dashboard.php?valida='.$info);	
}
else{
?>
	<script>
		alert('Cadastro não realizado, tente novamente !');
	</script>
	<?php
	$info = 'Cadastro não realizado, tente novamente !';
	header('location:../Dashboard.php?valida='.$info);
}
?>
