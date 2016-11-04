<?php

function verificaLoginSenha($login, $senha){
	
	$sql="SELECT * 
		  FROM Usuario
		  WHERE login = '$login' AND senha = '$senha'				
	";
	$result = mysqli_query($sql);
	
	if(mysqli_num_rows($result) !=0){		
		$dados = $result->fetchRow();
		return 1;
	}
	else{
		return 0;
	}
}
?>