<?php

	class usuario{
		
		var $idUsuario;
		var $nome;
		var $cpf;
		var $rg;
		var $logradouro;
		var $bairro;
		var $cidade;
		var $estado;
		var $sexo;
		var $email;
		var $login;
		var $password;
		var $tipoUsuario;
		
		// $dados - array contendo as variáveis para preenchimento da classe
		/*function usuario($dados){
			
			$nome 	 	= $dados[0];
			$cpf 			= $dados[1];
			$rg 	 		= $dados[2];
			$logradouro 	= $dados[3];
			$bairro 		= $dados[4];
			$cidade 	 	= $dados[5];
			$estado 	 	= $dados[6];
			$sexo 		= $dados[7];
			$login 	 	= $dados[8];
			$password 	= $dados[9];
			$tipoUsuario 	= $dados[10];
			$email 		= $dados[11];
		}*/
		function todosUsuarios(){
			$mysqli = new mysqli('localhost', 'admin', 'admin123','sumc');
			
			$sql="SELECT idUsuario FROM usuario WHERE 1";
			
			$result = $mysqli->query($sql);
			pr($result);
			while ($row = $result->fetch_array()) {
				
				$vet[] = new usuario();
				$vet[] = $this->pesquisaUsuario($row[0]);
			}
			return $vet;
		}
		function insereUsuario($dados){
			
			$mysqli = new mysqli('localhost', 'admin', 'admin123','sumc');
			//print_r($dados);
			$this->nome 	 	= $dados[0];
			$this->cpf 			= $dados[1];
			$this->rg 	 		= $dados[2];
			$this->logradouro 	= $dados[3];
			$this->bairro 		= $dados[4];
			$this->cidade 	 	= $dados[5];
			$this->estado 	 	= $dados[6];
			$this->sexo 		= $dados[7];
			if($dados[7] == "Outro"){
				$this->sexo = '';
			}
			$this->login 	 	= $dados[8];
			$this->password 	= $dados[9];
			$this->email 		= $dados[11];
			if($dados[10] == 'Funcionário'){
				$this->tipoUsuario 	= 3;
			}
			elseif($dados[10] == 'Médico'){
				$this->tipoUsuario 	= 2;
			}
			elseif($dados[10] == 'Administrador'){
				$this->tipoUsuario 	= 1;
			}
			
			$sql = "INSERT INTO usuario
					(idUsuario, nome, cpf, rg, logradouro, bairro, cidade, estado, sexo, email, login, password, tipoUsuario)
					VALUES
					(
					 NULL,
					 '$this->nome',
					 '$this->cpf',
					 '$this->rg',
					 '$this->logradouro',
					 '$this->bairro',
					 '$this->cidade',
					 '$this->estado',
					 '$this->sexo',
					 '$this->email',
					 '$this->login',
					 '$this->password',
					 '$this->tipoUsuario'
					 )";
			// print_r($sql);die;
			$result = $mysqli->query($sql);
			// print_r($result);die;
			if($result != 0){		
				return 1;
			}
			else{
				return 0;
			}
		}
		
		function deletaUsuario($idUsuario){
			
			$sql ="DELETE FROM usuario WHERE idUsuario = $idUsuario";
			
			$result = mysql_query($sql);
			return (1);
		}
		
		function pesquisaUsuario($idUsuario){
			$mysqli = new mysqli('localhost', 'admin', 'admin123','sumc');
			$sql ="SELECT * FROM usuario WHERE idUsuario = $idUsuario";
			
			$result = $mysqli->query($sql);
			
			if(mysqli_num_rows($result) !=0){
				$dados = $result->fetch_array();
				$this->idUsuario	= $dados[0];
				$this->nome 	 	= $dados[1];
				$this->cpf 			= $dados[2];
				$this->rg 	 		= $dados[3];
				$this->logradouro 	= $dados[4];
				$this->bairro 		= $dados[5];
				$this->cidade 	 	= $dados[6];
				$this->estado 	 	= $dados[7];
				$this->sexo 		= $dados[8];
				$this->login 	 	= $dados[9];
				$this->password 	= $dados[10];
				$this->tipoUsuario 	= $dados[11];
				return(1);	
			}
			else return (0);
		}
		
		function alteraUsuario($idUsuario, $dados){
			
			$nome 	 		= $dados[0];
			$cpf 			= $dados[1];
			$rg 	 		= $dados[2];
			$logradouro 	= $dados[3];
			$bairro 		= $dados[4];
			$cidade 	 	= $dados[5];
			$estado 	 	= $dados[6];
			$sexo 			= $dados[7];
			$login 	 		= $dados[8];
			$password 		= $dados[9];
			$tipoUsuario 	= $dados[10];
			
			$sql ="UPDATE usuario SET ('nome','cpf','rg','logradouro','bairro','cidade','estado','sexo','login','password','tipoUsuario') 
				VALUES ('$nome', '$cpf', '$rg','logradouro','bairro','cidade','estado','sexo','login','password','tipoUsuario') WHERE $idUsuario";
			
			$result = mysql_query($sql);
			
			if(mysql_num_rows($result) !=0){
				return (1);
			}
		}

			
	}
?>