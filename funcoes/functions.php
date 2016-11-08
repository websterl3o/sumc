<?php
global $link;
function verificaLoginSenha($login, $senha){
	
	$sql="SELECT * 
		  FROM usuario
		  WHERE login = '$login' AND password = '$senha'				
	";
	$result = mysqli_query($link, $sql);
	// echo $sql;
	// exit;
	if(mysqli_num_rows($result) != 0){		
		$dados = $result->fetchRow();
		return 1;
	}
	else{
		return 0;
	}
}
?>