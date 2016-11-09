<?php


global $link;
function verificaLoginSenha($login, $senha,$link){
	$mysqli = new mysqli('localhost', 'admin', 'admin123','sumc');
	$sql="SELECT * 
		  FROM usuario
		  WHERE login = '$login' AND password = '$senha'				
	";
	$result = $mysqli->query($sql);
	// echo $sql;
	// exit;
	$verifica = mysqli_num_rows($result);
	if($verifica != 0){		
		$dados = $result->fetch_row();
		return 1;
	}
	else{
		return 0;
	}
}
function pr($str, $align = '') {
    echo"<pre" . ( (!empty($align) ) ? " align='$align'" : "" ) . ">";
    print_r($str);
    echo"</pre>";
}
?>