<?php
function verificaLoginSenha($login, $senha){
	
	$sql="SELECT nome 
		  FROM Usuario
		  WHERE login = '$login' AND senha = '$senha'				
	"
	$result = mysql_query($sql);
	
	if(mysql_num_rows($result) !=0){
		
		$dados = $result->fetchRow();
		$return $dados[0];
	}
	else{
		return 0;
	}
}
?>